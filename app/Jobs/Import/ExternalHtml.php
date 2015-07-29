<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Jobs\Import;

use App\Jobs\Job;
use App\Models\RawData;
use GuzzleHttp;
use Storage;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Description here...
 */
class ExternalHtml extends Job
{
    /**
     * The main folder for raw files.
     *
     * @var string
     */
    protected $folder;

    /**
     * The raw file extension.
     *
     * @var string
     */
    protected $extension;

    /**
     * The backup folder for raw files.
     *
     * @var string
     */
    protected $oldFolder;

    /**
     * The item code.
     *
     * @var string
     */
    protected $itemCode;

    /**
     * The category id.
     *
     * @var int
     */
    protected $categoryId;

    /**
     * The tax office number.
     *
     * @var int
     */
    protected $taxOffice;

    /**
     * The year.
     *
     * @var int
     */
    protected $year;

    /**
     * The external item id.
     *
     * @var int
     */
    protected $itemId;

    /**
     * The item hash value.
     *
     * @var string
     */
    protected $hash;

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
     * Define the job mode.
     *
     * @var bool
     */
    protected $isUpdate;

    /**
     * Create a new job instance.
     *
     * @param int    $categoryId
     * @param int    $taxOffice
     * @param int    $year
     * @param int    $itemId
     * @param string $hash
     * @param string $lat
     * @param string $lng
     * @param bool   $isUpdate
     */
    public function __construct($categoryId, $taxOffice, $year, $itemId, $hash, $lat, $lng, $isUpdate)
    {
        $this->folder = env('BP_RAW_FOLDER', 'rawdata/');
        $this->oldFolder = env('BP_RAW_OLD_FOLDER', 'rawdata/old/');
        $this->extension = env('BP_RAW_FILE_EXT', '.raw');
        $this->categoryId = $categoryId;
        $this->itemCode = $taxOffice.'.'.$year.'.'.$itemId;
        $this->taxOffice = $taxOffice;
        $this->year = $year;
        $this->itemId = $itemId;
        $this->hash = $hash;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->isUpdate = $isUpdate;
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $guzzle = new GuzzleHttp\Client();

        print "\n > Saving $this->itemCode html as raw data... \n";

        $request = $guzzle->createRequest('GET', 'http://www.e-financas.gov.pt/vendas/detalheVenda.action?idVenda='.$this->itemId.'&sf='.$this->taxOffice.'&ano='.$this->year, [
            'headers' => [
                'User-Agent'  => '"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0"',
                'Accept'      => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Referrer'    => 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta=02&modalidade=&distrito=&concelho=&minimo=++.+++.+++.+++%2C++&maximo=++.+++.+++.+++%2C++&dataMin=&dataMax=',
            ],
            'debug' => false,
        ]);

        $response = $guzzle->send($request);
        $crawler = new Crawler((string) $response->getBody());

        $filePath = $this->folder.$this->itemCode.$this->extension;
        $oldPath = $this->oldFolder.$this->itemCode.$this->extension;
        $sourceCode = $crawler->filter('body')->html();

        if (Storage::exists($filePath)) {
            $currentVersion = $filePath;
            $previousVersion = $oldPath;

            if (Storage::exists($previousVersion)) {
                Storage::delete($previousVersion);
            }

            Storage::move($currentVersion, $previousVersion);
        }

        Storage::put($filePath, $sourceCode);

        if ($this->isUpdate) {
            $item = RawData::findOrFail($this->itemCode);
        } else {
            $item = new RawData();
            $item->code = $this->itemCode;
        }

        $item->hash = $this->hash;
        $item->lat = $this->lat;
        $item->lng = $this->lng;
        $item->category_id = $this->categoryId;
        $item->save();
    }
}
