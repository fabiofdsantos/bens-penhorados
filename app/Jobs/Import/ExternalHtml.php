<?php namespace App\Jobs\Import;

use Symfony\Component\DomCrawler\Crawler;
use App\Models\RawData;
use App\Jobs\Job;
use GuzzleHttp;
use Storage;

/**
 * Description here...
 */
class ExternalHtml extends Job
{
    protected $folder;
    protected $itemCode;
    protected $extension;
    protected $oldFolder;
    protected $taxOffice;
    protected $year;
    protected $itemId;
    protected $itemStatus;
    protected $lat;
    protected $lng;
    protected $isUpdate;

    public function __construct($taxOffice, $year, $itemId, $itemStatus, $lat, $lng, $isUpdate)
    {
        $this->folder = 'rawdata/';
        $this->oldFolder = 'rawdata/old/';
        $this->itemCode = $taxOffice.'.'.$year.'.'.$itemId;
        $this->extension = '.raw';
        $this->taxOffice = $taxOffice;
        $this->year = $year;
        $this->itemId = $itemId;
        $this->itemStatus = $itemStatus;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->isUpdate = $isUpdate;
    }

    public function handle()
    {
        var_dump('---------------- Extracting HTML: '.$this->taxOffice.'.'.$this->year.'.'.$this->itemId);

        $guzzle = new GuzzleHttp\Client();

        $request = $guzzle->createRequest('GET', 'http://www.e-financas.gov.pt/vendas/detalheVenda.action?idVenda='.$this->itemId.'&sf='.$this->taxOffice.'&ano='.$this->year, [
        'headers' => [
        'User-Agent' => '"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0"',
        'Accept'     => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Referer' => 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta=02&modalidade=&distrito=&concelho=&minimo=++.+++.+++.+++%2C++&maximo=++.+++.+++.+++%2C++&dataMin=&dataMax=',
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

        $item->status = $this->itemStatus;
        $item->lat = $this->lat;
        $item->lng = $this->lng;
        $item->save();
    }
}
