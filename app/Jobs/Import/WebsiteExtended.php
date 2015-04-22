<?php namespace App\Jobs\Import;

use Symfony\Component\DomCrawler\Crawler;
use App\Jobs\Job;
use GuzzleHttp;
use Bus;

/**
 * Description here...
 */
class WebsiteExtended extends Job
{
    protected $category;
    protected $existingItems;
    protected $currentPage;

    public function __construct($category, $existingItems, $currentPage)
    {
        $this->category = $category;
        $this->existingItems = $existingItems;
        $this->currentPage = $currentPage;
    }

    public function handle()
    {
        $guzzle = new GuzzleHttp\Client();

        var_dump('Categoria: '.$this->category.'---- Pagina: '.$this->currentPage);

        $request = $guzzle->createRequest('GET', 'www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$this->category.'&page='.$this->currentPage, [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',
                'Accept'     => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Referer' => 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$this->category,
            ],
            'debug' => false,
            ]);

        $response = $guzzle->send($request);

        $crawler = new Crawler((string) $response->getBody());

        $input = trim($crawler->filter('td.w100')->text());

        preg_match_all('/\d{1,}/', $input, $output);

        if (count($output[0]) > 1) {
            $from = (int) $output[0][0];
            $to = (int) $output[0][1];
            $totalCurrentPage = (($to-$from)+1);
        } else {
            return 'preg_match_all() failed';
        }

        for ($i = 7; $i <= ($totalCurrentPage+7); $i++) {
            $item = $crawler->filter('table.w100 > tr:nth-child('.$i.') > td:nth-child(1) > div:nth-child(1) > table:nth-child(1) > tr:nth-child(2) > td:nth-child(1)');

            $flagItemCodeFound = false;
            $flagItemStatusFound = false;

            for ($x = 1; $x <= ($item->filter('span')->count()); $x++) {
                $currentSpan = $item->filter('span:nth-child('.$x.')')->text();

                if (preg_match('/Nº Venda:/i', $currentSpan, $match)) {
                    $nextSpan = $item->filter('span:nth-child('.($x+1).')')->text();

                    preg_match_all('/\d{1,}/', $nextSpan, $nextSpanOutput);

                    if (count($nextSpanOutput[0]) == 3) {
                        $taxOffice = $nextSpanOutput[0][0];
                        $year = $nextSpanOutput[0][1];
                        $itemId = $nextSpanOutput[0][2];

                        $itemCode = $taxOffice.'.'.$year.'.'.$itemId;

                        $flagItemCodeFound = true;
                    }
                } elseif (preg_match('/Estado Actual:/i', $currentSpan, $match)) {
                    $nextSpan = $item->filter('span:nth-child('.($x+1).')')->text();

                    $itemStatus = $nextSpan;
                    $flagItemStatusFound = true;
                } else {
                    if ($flagItemCodeFound == true && $flagItemStatusFound == true) {
                        $x = $item->filter('span')->count();

                        if (array_key_exists($itemCode, $this->existingItems)) {
                            if ($this->existingItems[$itemCode] != $itemStatus) {
                                Bus::dispatch(new ExternalHtml($taxOffice, $year, $itemId, $itemStatus, null, null, true));
                                var_dump('Venda numero: '.$itemCode.' || Estado: '.$itemStatus);
                            } else {
                                var_dump('----- JA EXISTE NA BASE DE DADOS COM O MESMO ESTADO -----');
                            }
                        } else {
                            Bus::dispatch(new ExternalHtml($taxOffice, $year, $itemId, $itemStatus, null, null, false));
                            var_dump('Venda numero: '.$itemCode.' || Estado: '.$itemStatus);
                        }
                    }
                }
            }
        }
    }
}
