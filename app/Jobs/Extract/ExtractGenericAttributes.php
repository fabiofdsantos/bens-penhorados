<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Jobs\Extract;

use App\Helpers\Text;
use App\Jobs\Job;
use App\Models\Items\Attributes\ItemCategory;
use App\Models\Items\Item;
use Bus;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Storage;
use Symfony\Component\DomCrawler\Crawler;

class ExtractGenericAttributes extends Job
{
    /**
     * The attributes that should be extracted.
     *
     * @var array
     */
    protected $attributes = [
        'code'             => null,
        'category_id'      => null,
        'title'            => null,
        'tax_office'       => null,
        'year'             => null,
        'status'           => null,
        'mode'             => null,
        'price'            => null,
        'vat'              => null,
        'lat'              => null,
        'lng'              => null,
        'images'           => null,
        'full_description' => null,
        'depositary_name'  => null,
        'depositary_phone' => null,
        'depositary_email' => null,
        'mediator_name'    => null,
        'mediator_phone'   => null,
        'mediator_email'   => null,
        'preview_dt_start' => null,
        'preview_dt_end'   => null,
        'acceptance_dt'    => null,
        'opening_dt'       => null,
    ];

    /**
     * The path to the raw data file on disk.
     *
     * @var string
     */
    protected $filePath;

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
     * @param int    $categoryId
     * @param string $lat
     * @param string $lng
     * @param bool   $ignoreImages
     */
    public function __construct($code, $categoryId, $lat, $lng, $ignoreImages)
    {
        $this->attributes['code'] = $code;
        $this->attributes['category_id'] = $categoryId;
        $this->attributes['lat'] = $lat;
        $this->attributes['lng'] = $lng;
        $this->filePath = $this->getFilePath($code);
        $this->downloadImages = ($ignoreImages === false ? true : false);
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

        // Check if the item exists
        if ($this->itemExists($crawler)) {
            print "\n > Extracting generic attributes of {$this->attributes['code']} ... \n";

            // Extract the tax office number and the year of publication
            preg_match_all('/\d{1,}/', $this->attributes['code'], $match);
            $this->attributes['tax_office'] = $match[0][0];
            $this->attributes['year'] = $match[0][1];

            // Extract attributes from top of the raw data
            $topCrawler = $crawler->filter('#trFotoP > th:nth-child(1)');
            $this->extractTopAttributes($topCrawler);

            // Extract attributes from the bottom of the raw data
            $bottomCrawler = $crawler->filter('#dataTable > tr:nth-child(3) > td:nth-child(1) > table:nth-child(1) > tr:nth-child(1)');
            $this->extractBottomAttributes($bottomCrawler);

            // Extract images
            if ($this->downloadImages) {
                $mediaCrawler = $crawler->filter('#trFotoP > th:nth-child(2)');
                $this->attributes['images'] = $this->extractImages($mediaCrawler);
            }

            // Create a new generic item
            Item::create($this->attributes);

            // Get the category's name and split the description
            $category = ItemCategory::find($this->attributes['category_id']);
            $description = Text::splitter($this->attributes['full_description']);

            // Call the right command to extract specific category's attributes
            if ($category->name === 'Imóveis') {
                // to do
            } elseif ($category->name === 'Veículos') {
                Bus::dispatch(new ExtractVehicleAttributes($this->attributes['code'], $description));
            } elseif ($category->name === 'Participações sociais') {
                Bus::dispatch(new ExtractCorporateShareAttributes($this->attributes['code'], $description));
            } else {
                // to do
            }
        } else {
            print "\n > The item {$this->attributes[code]} is unavailable! \n";
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
     * Extract item's attributes from the top of the raw data.
     *
     * @param Crawler $crawler
     *
     * @return void
     */
    private function extractTopAttributes(Crawler $crawler)
    {
        foreach ($crawler->filter('span.info-element-title') as $i => $node) {
            $title = Text::removeAccents($node->nodeValue);
            $text = $crawler->filter('span.info-element-text')->eq($i)->text();

            if (preg_match('/preco/i', $title)) {
                $this->attributes['price'] = $this->extractPrice($text);

                if (isset($this->attributes['price'])) {
                    $this->attributes['vat'] = $this->extractVat($text);
                }
            } elseif (preg_match('/estado da venda/i', $title)) {
                $this->attributes['status'] = $this->extractStatus($text);
            } elseif (preg_match('/modalidade/i', $title)) {
                $this->attributes['mode'] = $this->extractMode($text);
            }
        }
    }

    /**
     * Extract item's attributes from the bottom of the raw data.
     *
     * @param Crawler $crawler
     *
     * @return void
     */
    private function extractBottomAttributes(Crawler $crawler)
    {
        foreach ($crawler->filter('span.info-element-title') as $i => $node) {
            $title = Text::removeAccents($node->nodeValue);

            $text = $crawler->filter('span.info-element-text')->eq($i)->text();
            $text = Text::clean($text);

            if (preg_match('/caracteristicas/i', $title)) {
                $this->attributes['full_description'] = $text;
            } elseif (preg_match('/fiel depositario/i', $title)) {
                $this->attributes['depositary_name'] = $this->extractName($text);

                if (isset($this->attributes['depositary_name'])) {
                    $this->attributes['depositary_phone'] = $this->extractPhoneNumber($text);

                    if (preg_match('/email/i', $text)) {
                        $text = $crawler->filter('span.info-element-text')->eq($i)->attr('href');
                        $this->attributes['depositary_email'] = $this->extractEmail($text);
                    }
                }
            } elseif (preg_match('/mediador/i', $title)) {
                $this->attributes['mediator_name'] = $this->extractName($text);

                if (isset($this->attributes['mediator_name'])) {
                    $this->attributes['mediator_phone'] = $this->extractPhoneNumber($text);

                    if (preg_match('/email/i', $text)) {
                        $text = $crawler->filter('span.info-element-text')->eq($i)->attr('href');
                        $this->attributes['mediator_email'] = $this->extractEmail($text);
                    }
                }
            } elseif (preg_match('/examinar o bem/i', $title)) {
                $preview_dt = $this->extractStartEndDateTime($text);
                $this->attributes['preview_dt_start'] = $preview_dt[0];
                $this->attributes['preview_dt_end'] = $preview_dt[1];
            } elseif (preg_match('/abertura das propostas/i', $title)) {
                $this->attributes['opening_dt'] = $this->extractSingleDateTime($text);
            } elseif (preg_match('/aceitacao das propostas/i', $title)) {
                $this->attributes['acceptance_dt'] = $this->extractSingleDateTime($text);
            }
        }
    }

    /**
     * Extract the item's price.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractPrice($str)
    {
        if (preg_match('/(\d+?\.?\d+\,\d+)/', $str, $match)) {
            $match[0] = str_replace('.', '', $match[0]);
            $match[0] = str_replace(',', '.', $match[0]);

            return (integer) $match[0];
        }
    }

    /**
     * Extract the item's vat.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractVat($str)
    {
        if (preg_match('/(\d+)(,\d+)?% IVA incluído/ui', $str, $match)) {
            return (integer) $match[0];
        }
    }

    /**
     * Extract the item's status.
     *
     * @param string $str
     *
     * @return string
     */
    private function extractStatus($str)
    {
        return $str;
    }

    /**
     * Extract the mode.
     *
     * @param string $str
     *
     * @return string
     */
    private function extractMode($str)
    {
        return $str;
    }

    /**
     * Extract a name.
     *
     * @param string $str
     *
     * @return string|null
     */
    private function extractName($str)
    {
        if (preg_match('/^[^(]+(?=$|\s)/ui', $str, $match)) {
            return $match[0];
        }
    }

    /**
     * Extract a phone number.
     *
     * @param string $str
     *
     * @return int|null
     */
    private function extractPhoneNumber($str)
    {
        if (preg_match('/\d{9,}/', $str, $match)) {
            return (integer) $match[0];
        }
    }

    /**
     * Extract an email.
     *
     * @param string $str
     *
     * @return string|null
     */
    private function extractEmail($str)
    {
        if (preg_match('/\w+@\w+\.\w{1,}/i', $str, $match)) {
            return strtolower($match[0]);
        }
    }

    /**
     * Extract a start and end datetime.
     *
     * @param string $str
     *
     * @return array
     */
    private function extractStartEndDateTime($str)
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
     * @return Carbon|null
     */
    private function extractSingleDateTime($str)
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
     * @param Crawler $crawler
     *
     * @return string
     */
    private function extractImages($crawler)
    {
        $externalImages = [];
        $image_total = $crawler->filter('img')->count();
        for ($c = 1; $c <= $image_total; $c++) {
            $externalImages[$c - 1] = $crawler->filter('img:nth-child('.$c.')')->attr('src');
            $externalImages[$c - 1] = preg_replace('/1(?=\.jpg)/', '2', $externalImages[$c - 1]);
        }

        if (!preg_match('/img_semfoto/', $externalImages[0])) {
            $i = 1;
            $images = [];
            $manager = new ImageManager();
            foreach ($externalImages as $ext_img) {
                try {
                    $img = $manager->make($ext_img);
                    $filename = $i.'-'.$this->attributes['code'].'.jpg';
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
     * Get the file path for a given item code.
     *
     * @param string $code
     *
     * @return string
     */
    private function getFilePath($code)
    {
        $path = env('BP_RAW_FOLDER', 'rawdata/');
        $path .= $code;
        $path .= env('BP_RAW_FILE_EXT', '.html.part');

        return $path;
    }
}
