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

use App\Extractors\Wrappers\GenericExtractorWrapper;
use App\Helpers\Text;
use App\Jobs\Job;
use App\Models\Attributes\Generic\ItemCategory;
use App\Models\Attributes\Generic\ItemTaxOffice;
use App\Models\Items\Item;
use App\Models\RawData;
use Bus;
use Intervention\Image\ImageManager;
use Storage;
use Symfony\Component\DomCrawler\Crawler;

/**
 * This is the extract generic attributes job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractGenericAttributesJob extends Job
{
    /**
     * The generic extractor.
     *
     * @var GenericExtractorWrapper
     */
    protected $extractor;

    /**
     * The attributes that should be extracted.
     *
     * @var array
     */
    protected $attributes = [
        'code'             => null,
        'category_id'      => null,
        'status_id'        => null,
        'tax_office_id'    => null,
        'year'             => null,
        'purchase_type_id' => null,
        'district_id'      => null,
        'municipality_id'  => null,
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
        $this->extractor = new GenericExtractorWrapper();
    }

    /**
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

            // Set default title
            $this->attributes['title'] = $this->attributes['code'];

            // Extract the tax office number and the year of publication
            preg_match_all('/\d{1,}/', $this->attributes['code'], $match);
            $this->attributes['tax_office_id'] = $this->extractor->taxOffice($match[0][0]);
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

            // Create or update a generic item
            $this->setLocationByTaxOffice();
            Item::updateOrCreate($this->attributes);

            // Split the description
            $description = Text::splitter($this->attributes['full_description']);

            // Call the right command to extract specific attributes
            $category = ItemCategory::find($this->attributes['category_id']);
            if ($category->name === 'Imóveis') {
                Bus::dispatch(new ExtractPropertyAttributesJob($this->attributes['code'], $description));
            } elseif ($category->name === 'Veículos') {
                Bus::dispatch(new ExtractVehicleAttributesJob($this->attributes['code'], $description));
            } elseif ($category->name === 'Participações sociais') {
                Bus::dispatch(new ExtractCorporateShareAttributesJob($this->attributes['code'], $this->attributes['full_description']));
            } else {
                // Set is_other_type as true
                Item::find($this->attributes['code'])->update(['is_other_type' => true]);

                // Update raw data
                RawData::find($this->attributes['code'])->update(['extracted' => true]);
            }
        } else {
            print "\n > The item {$this->attributes[code]} is unavailable! \n";
        }
    }

    /**
     * Called when the job is failing.
     *
     * @return void
     */
    public function failed()
    {
        $msg = self::class;
        $msg .= ' - Código: '.$this->attributes['code'];

        app('LogExtract')->error($msg);
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
                $this->attributes['price'] = $this->extractor->price($text);

                if (isset($this->attributes['price'])) {
                    $this->attributes['vat'] = $this->extractor->vat($text);
                }
            } elseif (preg_match('/estado da venda/i', $title)) {
                $this->attributes['status_id'] = $this->extractor->status($text);
            } elseif (preg_match('/modalidade/i', $title)) {
                $this->attributes['purchase_type_id'] = $this->extractor->purchaseType($text);
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

            if (preg_match('/caracteristicas/i', $title)) {
                $this->attributes['full_description'] = Text::clean($text);
            } elseif (preg_match('/fiel depositario/i', $title)) {
                $this->attributes['depositary_name'] = $this->extractor->fullName($text);

                if (isset($this->attributes['depositary_name'])) {
                    $this->attributes['depositary_phone'] = $this->extractor->phoneNumber($text);

                    if (preg_match('/email/i', $text)) {
                        $text = $crawler->filter('span.info-element-text')->eq($i)->filter('a')->attr('href');
                        $this->attributes['depositary_email'] = $this->extractor->email($text);
                    }
                }
            } elseif (preg_match('/mediador/i', $title)) {
                $this->attributes['mediator_name'] = $this->extractor->fullName($text);

                if (isset($this->attributes['mediator_name'])) {
                    $this->attributes['mediator_phone'] = $this->extractor->phoneNumber($text);

                    if (preg_match('/email/i', $text)) {
                        $text = $crawler->filter('span.info-element-text')->eq($i)->filter('a')->attr('href');
                        $this->attributes['mediator_email'] = $this->extractor->email($text);
                    }
                }
            } elseif (preg_match('/examinar o bem/i', $title)) {
                $preview_dt = $this->extractor->startEndDatetime($text);
                $this->attributes['preview_dt_start'] = $preview_dt[0];
                $this->attributes['preview_dt_end'] = $preview_dt[1];
            } elseif (preg_match('/abertura das propostas/i', $title)) {
                $this->attributes['opening_dt'] = $this->extractor->datetime($text);
            } elseif (preg_match('/aceitacao das propostas/i', $title)) {
                $this->attributes['acceptance_dt'] = $this->extractor->datetime($text);
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
     * Set the location of the current item by the tax office location.
     *
     * @return void
     */
    private function setLocationByTaxOffice()
    {
        $office = ItemTaxOffice::find($this->attributes['tax_office_id']);

        $this->attributes['municipality_id'] = $office->municipality->id;
        $this->attributes['district_id'] = $office->municipality->district->id;
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
