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
use Illuminate\Support\Facades\Bus;
use Symfony\Component\DomCrawler\Crawler;
use App\Jobs\Extract\ExtractGenericAttributesJob;

/**
 * This is the backup item page job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class BackupItemPageJob extends Job
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
     * @param bool   $isUpdate
     */
    public function __construct($categoryId, $taxOffice, $year, $itemId, $hash, $isUpdate)
    {
        $this->folder = env('BP_RAW_FOLDER', 'rawdata/');
        $this->oldFolder = env('BP_RAW_OLD_FOLDER', 'rawdata/old/');
        $this->extension = env('BP_RAW_FILE_EXT', '.html.part');
        $this->categoryId = $categoryId;
        $this->itemCode = $taxOffice.'.'.$year.'.'.$itemId;
        $this->taxOffice = $taxOffice;
        $this->year = $year;
        $this->itemId = $itemId;
        $this->hash = $hash;
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

        echo "\n > Saving $this->itemCode html as raw data... \n";

        $request = $guzzle->request('GET', 'http://www.e-financas.gov.pt/vendas/detalheVenda.action?idVenda='.$this->itemId.'&sf='.$this->taxOffice.'&ano='.$this->year, [
            'headers' => [
                'User-Agent'  => '"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0"',
                'Accept'      => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Referrer'    => 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta=02&modalidade=&distrito=&concelho=&minimo=++.+++.+++.+++%2C++&maximo=++.+++.+++.+++%2C++&dataMin=&dataMax=',
            ],
            'debug' => false,
        ]);

        $crawler = new Crawler((string) $request->getBody());

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
            $item->extracted = false;
        }

        $item->hash = $this->hash;
        $item->category_id = $this->categoryId;
        $item->save();

        Bus::dispatch(new ExtractGenericAttributesJob($this->itemCode, $this->categoryId, null, null, false));
    }

    /**
     * Called when the job is failing.
     *
     * @return void
     */
    public function failed()
    {
        $msg = self::class;
        $msg .= ' - Código: '.$this->itemCode;

        app('LogImport')->error($msg);
    }
}
