<?php

namespace App\Jobs\Extract;

use App\Jobs\Job;
use App\Models\Items\Item;
use Bus;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Storage;
use Symfony\Component\DomCrawler\Crawler;

class ItemGeneric extends Job
{
    /**
     * The item code.
     *
     * @var string
     */
    protected $code;

    /**
     * The item latitude.
     *
     * @var string
     */
    protected $lat;

    /**
     * The item longitude.
     *
     * @var string
     */
    protected $lng;

    /**
     * The complete path to the file on disk.
     *
     * @var string
     */
    protected $filePath;

    /**
     * The item description.
     *
     * @var string
     */
    protected $description;

    /**
     * The item category.
     *
     * @var int
     */
    protected $category;

    /**
     * If true, images will be extracted.
     *
     * @var bool
     */
    protected $downloadImages;

    /**
     * Create a new job instance.
     *
     * @param string $code
     * @param string $lat
     * @param string $lng
     * @param bool   $ignoreImages
     */
    public function __construct($code, $lat, $lng, $ignoreImages)
    {
        $this->code = $code;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->filePath = env('BP_RAW_FOLDER', 'rawdata/').$code.env('BP_RAW_FILE_EXT', '.raw');
        $this->downloadImages = ($ignoreImages == false ? true : false);
    }

    /***
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent(Storage::get($this->filePath));

        if ($this->itemExists($crawler)) {
            print "\n > Creating a generic item of $this->code ... \n";

            $item = new Item();
            $item->code = $this->code;
            $item->lat = $this->lat;
            $item->lng = $this->lng;

            preg_match_all('/\d{1,}/', $this->code, $match);
            $item->tax_office = $match[0][0];
            $item->year = $match[0][1];

            //$this->data->title = trim($crawler->filter('#tdTitulo')->text());
            $this->category = trim($crawler->filter('th.info-table-title:nth-child(1)')->text());

            $headerDetails = $crawler->filter('#trFotoP > th:nth-child(1)');

            $spans_total = $headerDetails->filter('span')->count();
            for ($x = 1; $x <= ($spans_total + 5); $x++) {
                if ($headerDetails->filter('span:nth-child('.$x.')')->count()) {
                    $currentSpan = $headerDetails->filter('span:nth-child('.$x.')')->text();

                    if (preg_match('/Base de Venda/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($headerDetails->filter('span:nth-child('.($x + 1).')')->text());
                            $item->price = $this->extractPrice($nodeText);

                            if (isset($item->price)) {
                                $item->vat = $this->extractVat($nodeText);
                            }
                        } catch (\Exception $e) {
                            $item->price = null;
                            $item->vat = null;
                        }
                    } elseif (preg_match('/Estado da Venda/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($headerDetails->filter('span:nth-child('.($x + 1).')')->text());
                            $item->status = $this->extractStatus($nodeText);
                        } catch (\Exception $e) {
                            $item->status = null;
                        }
                    } elseif (preg_match('/Modalidade/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($headerDetails->filter('span:nth-child('.($x + 1).')')->text());
                            $item->mode = $this->extractMode($nodeText);
                        } catch (\Exception $e) {
                            $item->mode = null;
                        }
                    }
                }
            }

            $footerDetails = $crawler->filter('#dataTable > tr:nth-child(3) > td:nth-child(1) > table:nth-child(1) > tr:nth-child(1)');

            $spans_total = $footerDetails->filter('th:nth-child(1) > span')->count();
            for ($i = 1; $i <= ($spans_total + 6); $i++) {
                if ($footerDetails->filter('th:nth-child(1) > span:nth-child('.$i.')')->count()) {
                    $currentSpan = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.$i.')')->text());
                    if (preg_match('/Caracter/i', $currentSpan, $match)) {
                        try {
                            $this->description = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                        } catch (\Exception $e) {
                            $this->description = null;
                        }
                    } elseif (preg_match('/Fiel Deposit/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                            $item->depositary_name = $this->extractName($nodeText);
                        } catch (\Exception $e) {
                            $item->depositary_name = null;
                            $item->depositary_phone = null;
                            $item->depositary_email = null;
                        }

                        if (isset($item->depositary_name)) {
                            $item->depositary_phone = $this->extractPhoneNumber($nodeText);

                            if (preg_match('/Email/i', $nodeText, $match)) {
                                $nodeText = $footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).') > a')->attr('href');
                                $item->depositary_email = $this->extractEmail($nodeText);
                            }
                        }
                    } elseif (preg_match('/Mediador/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                            $item->mediator_name = $this->extractName($nodeText);
                        } catch (\Exception $e) {
                            $item->mediator_name = null;
                            $item->mediator_phone = null;
                            $item->mediator_email = null;
                        }

                        if (isset($item->mediator_name)) {
                            $item->mediator_phone = $this->extractPhoneNumber($nodeText);

                            if (preg_match('/Email/i', $nodeText, $match)) {
                                $nodeText = $footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).') > a')->attr('href');
                                $item->mediator_email = $this->extractEmail($nodeText);
                            }
                        }
                    } elseif (preg_match('/examinar o bem/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                            $preview_dt = $this->extractStartEndDateTime($nodeText);
                            $item->preview_dt_start = $preview_dt[0];
                            $item->preview_dt_end = $preview_dt[1];
                        } catch (\Exception $e) {
                            $item->preview_dt_start = null;
                            $item->preview_dt_end = null;
                        }
                    } elseif (preg_match('/aceitaçao das propostas/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                            $item->acceptance_dt = $this->extractSingleDateTime($nodeText);
                        } catch (\Exception $e) {
                            $item->acceptance_dt = null;
                        }
                    } elseif (preg_match('/abertura das propostas/i', $currentSpan, $match)) {
                        try {
                            $nodeText = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i + 1).')')->text());
                            $item->opening_dt = $this->extractSingleDateTime($nodeText);
                        } catch (\Exception $e) {
                            $item->opening_dt = null;
                        }
                    }
                }
            }

            if ($this->downloadImages) {
                $headerImages = $crawler->filter('#trFotoP > th:nth-child(2)');
                $images = [];

                $image_total = $headerImages->filter('img')->count();
                for ($c = 1; $c <= $image_total; $c++) {
                    $images[$c - 1] = $headerImages->filter('img:nth-child('.$c.')')->attr('src');
                    $images[$c - 1] = preg_replace('/1(?=\.jpg)/', '2', $images[$c - 1]);
                }

                $item->images = $this->extractImages($images);
            }

            $item->save();

            if (preg_match('/Imóveis/ui', $this->category)) {
                // to do
            } elseif (preg_match('/Veículos/ui', $this->category)) {
                Bus::dispatch(new ItemVehicle($this->code, $this->tokenize($this->description)));
            } else {
                // to do
            }
        } else {
            print "\n > The item $this->code is unavailable! \n";
        }
    }

    /**
     * Check if the item exists.
     * 
     * @param Crawler $crawler
     *
     * @return bool
     */
    public function itemExists(Crawler $crawler)
    {
        if ($crawler->filter('.info-element-title > p:nth-child(1)')->count() > 0) {
            // dupla verificação
            if ($crawler->filter('.info-element-title > p')->text() == 'Venda inexistente ou inactiva.' || $crawler->filter('.info-element-title > p')->text() == 'Venda não disponível para consulta') {
                //return 'not found';
            } else {
                /*Por motivos de ordem técnica, não é possível satisfazer o seu pedido neste momento.
                Por favor tente mais tarde.*/
                //return 'something strange happened here!';
            }
        }

        return true;
    }

    /**
     * Extract the price.
     *
     * @param string $str
     *
     * @return mixed
     */
    public function extractPrice($str)
    {
        if (preg_match('/(\d+?\.?\d+\,\d+)/', $str, $match)) {
            $match[0] = str_replace('.', '', $match[0]);
            $match[0] = str_replace(',', '.', $match[0]);

            return $match[0];
        }
    }

    /**
     * Extract the vat.
     *
     * @param string $str
     *
     * @return mixed
     */
    public function extractVat($str)
    {
        if (preg_match('/(\d+)(,\d+)?% IVA incluído/ui', $str, $match)) {
            return $match[0];
        }
    }

    /**
     * Extract the current status.
     * 
     * @param string $str
     *
     * @return mixed
     */
    public function extractStatus($str)
    {
        return $str;
    }

    /**
     * Extract the mode.
     * 
     * @param string $str
     *
     * @return mixed
     */
    public function extractMode($str)
    {
        return $str;
    }

    /**
     * Extract the name.
     * 
     * @param string $str
     *
     * @return mixed
     */
    public function extractName($str)
    {
        $str = preg_replace('/(\\n)|(\\t)/', '', $str);

        if (preg_match('/^[^(]+(?=$|\s)/ui', $str, $match)) {
            return $match[0];
        }
    }

    /**
     * Extract the phone number.
     * 
     * @param string $str
     *
     * @return mixed
     */
    public function extractPhoneNumber($str)
    {
        if (preg_match('/\d{9,}/', $str, $match)) {
            return $match[0];
        }
    }

    /**
     * Extract the email.
     * 
     * @param string $str
     *
     * @return string
     */
    public function extractEmail($str)
    {
        if (preg_match('/\w+@\w+\.\w{1,}/i', $str, $match)) {
            return strtolower($match[0]);
        }
    }

    /**
     * Extract the start and end datetime.
     *
     * @param string $str
     *
     * @return array
     */
    public function extractStartEndDateTime($str)
    {
        $preview_dt = [];

        if (preg_match('/\d+\-\d+\-\d+/', $str, $match)) {
            preg_match_all('/\d+\-\d+\-\d+/', $str, $match_date);
            preg_match_all('/\d+\:\d+/', $str, $match_time);

            $dt_start = $match_date[0][0].'-'.$match_time[0][0];
            $dt_end = $match_date[0][1].'-'.$match_time[0][1];

            $preview_dt[0] = Carbon::createFromFormat('Y-m-d-H:i', $dt_start);
            $preview_dt[1] = Carbon::createFromFormat('Y-m-d-H:i', $dt_end);
        } else {
            $preview_dt[0] = null;
            $preview_dt[1] = null;
        }

        return $preview_dt;
    }

    /**
     * Extract a single datetime.
     * 
     * @param string $str
     *
     * @return Carbon object
     */
    public function extractSingleDateTime($str)
    {
        if (preg_match('/\d+\-\d+\-\d+/', $str, $match_date)) {
            if (preg_match('/\d+\:\d+/', $str, $match_time)) {
                $dt = $match_date[0].'-'.$match_time[0];

                return Carbon::createFromFormat('Y-m-d-H:i', $dt);
            } else {
                $dt = $match_date[0];

                return Carbon::createFromFormat('Y-m-d', $dt);
            }
        }
    }

    /**
     * Extract all images and save them on disk.
     * 
     * @param array $external_images
     *
     * @return string
     */
    public function extractImages($external_images)
    {
        if (!preg_match('/img_semfoto/', $external_images[0])) {
            $i = 1;
            $images = [];
            $manager = new ImageManager();
            foreach ($external_images as $ext_img) {
                try {
                    $img = $manager->make($ext_img);
                    $filename = $i.'-'.$this->code.'.jpg';
                    $img->fit(600, 400);
                    $img->encode('jpg', 90);
                    $img->save('public/images/'.$filename);

                    $images[] = $filename;
                } catch (\Exception $e) {
                    // to do
                }
                $i++;
            }

            return json_encode($images);
        }
    }

    /**
     * Split a given text into smaller units called token. Remove punctuation
     * characters except "-" and break on whitespace.
     *
     * Regex explanation:
     * \pP matches any kind of punctuation character
     * \PP matches any characters that \pP does not
     * \pZ matches any kind of whitespace or invisible separator
     * \pC matches invisible control characters and unused code points.
     *
     * @param string $str
     *
     * @return array
     */
    public function tokenize($str)
    {
        $str = preg_replace('/[^\PP-]/ui', '', $str);

        return preg_split('/[\pZ\pC]/ui', $str, null, PREG_SPLIT_NO_EMPTY);
    }
}
