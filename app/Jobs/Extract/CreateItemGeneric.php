<?php namespace App\Jobs\Extract;

use Intervention\Image\ImageManager;
use App\Models\SourceData;
use App\Models\Items\Item;
use Carbon\Carbon;
use App\Jobs\Job;

/**
 * Description here...
 */
class CreateItemGeneric extends Job
{
    public function handle()
    {
        $sourceItems = SourceData::all();

        foreach ($sourceItems as $sourceItem) {
            $item = new Item();
            $item->code = $sourceItem->code;
            $data = json_decode($sourceItem->data);

            preg_match_all('/\d{1,}/', $sourceItem->code, $match);
            $item->tax_office = $match[0][0];
            $item->year = $match[0][1];

            $item->status = $data->status;
            $item->mode = $data->mode;

            if (preg_match('/(\d+?\.?\d+\,\d+)/', $data->price, $match)) {
                $item->price = $match[0];
                if (preg_match('/IVA incluído/i', $data->price, $match)) {
                    $item->incl_vat = true;
                } else {
                    $item->incl_vat = false;
                }
            } else {
                $item->price = null;
                $item->incl_vat = null;
            }

            $item->lat = $data->lat;
            $item->lng = $data->lng;

            if (preg_match('/img_semfoto/', $data->images[0], $match)) {
                $item->images = null;
            } else {
                $i = 1;
                $images = [];
                $manager = new ImageManager();
                foreach ($data->images as $external_image) {
                    try {
                        $img = $manager->make($external_image);
                        $filename = $i.'-'.$sourceItem->code.'.jpg';
                        $img->encode('jpg', 90);
                        $img->save('public/images/'.$filename);
                    } catch (\Exception $e) {
                        // to do
                    }
                    $i++;
                    $images[] = $filename;
                }
                $item->images = json_encode($images);
            }

            if (preg_match('/^[^(]+(?=$|\s)/ui', $data->depositary, $match)) {
                $item->depositary_name = $match[0];

                if (preg_match('/\d{9,}/', $data->depositary, $match)) {
                    $item->depositary_phone = $match[0];
                } else {
                    $item->depositary_phone = null;
                }

                if (preg_match('/\w+@\w+\.\w{1,}/i', $data->depositary, $match)) {
                    $item->depositary_email = strtolower($match[0]);
                }
            } else {
                $item->depositary_name = null;
                $item->depositary_phone = null;
                $item->depositary_email = null;
            }

            if (preg_match('/^[^(]+(?=$|\s)/ui', $data->depositary, $match)) {
                $item->mediator_name = $match[0];

                if (preg_match('/\d{9,}/', $data->depositary, $match)) {
                    $item->mediator_phone = $match[0];
                } else {
                    $item->mediator_phone = null;
                }

                if (preg_match('/\w+@\w+\.\w{1,}/i', $data->mediator, $match)) {
                    $item->mediator_email = strtolower($match[0]);
                }
            } else {
                $item->mediator_name = null;
                $item->mediator_phone = null;
                $item->mediator_email = null;
            }

            if (preg_match('/\d+\-\d+\-\d+/', $data->preview, $match)) {
                preg_match_all('/\d+\-\d+\-\d+/', $data->preview, $match_date);
                preg_match_all('/\d+\:\d+/', $data->preview, $match_time);

                $dt_start = $match_date[0][0].'-'.$match_time[0][0];
                $dt_end = $match_date[0][1].'-'.$match_time[0][1];

                $item->preview_dt_start = Carbon::createFromFormat('Y-m-d-H:i', $dt_start);
                $item->preview_dt_end = Carbon::createFromFormat('Y-m-d-H:i', $dt_end);
            } else {
                $item->preview_dt_start = null;
                $item->preview_dt_end = null;
            }

            if (preg_match('/\d+\-\d+\-\d+/', $data->acceptance, $match_date)) {
                if (preg_match('/\d+\:\d+/', $data->acceptance, $match_time)) {
                    $dt = $match_date[0].'-'.$match_time[0];
                    $item->acceptance_dt = Carbon::createFromFormat('Y-m-d-H:i', $dt);
                } else {
                    $dt = $match_date[0];
                    $item->acceptance_dt = Carbon::createFromFormat('Y-m-d', $dt);
                }
            } else {
                $item->acceptance = null;
            }

            if (preg_match('/\d+\-\d+\-\d+/', $data->opening, $match_date)) {
                if (preg_match('/\d+\:\d+/', $data->opening, $match_time)) {
                    $dt = $match_date[0].'-'.$match_time[0];
                    $item->opening_dt = Carbon::createFromFormat('Y-m-d-H:i', $dt);
                } else {
                    $dt = $match_date[0];
                    $item->opening_dt = Carbon::createFromFormat('Y-m-d', $dt);
                }
            } else {
                $item->opening_dt = null;
            }

            $item->save();
        }
    }
}
