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

use App\Helpers\Text;
use App\Jobs\Job;
use App\Models\RawData;
use Bus;
use GuzzleHttp;
use Hash;
use Symfony\Component\DomCrawler\Crawler;

class WebsiteExtended extends Job
{
    protected $category;

    /**
     * The number of the current page.
     *
     * @var int
     */
    protected $currentPage;

    /**
     * Create a new job instance.
     *
     * @param int $currentPage
     */
    public function __construct($category, $currentPage)
    {
        $this->category = $category;
        $this->currentPage = $currentPage;
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $guzzle = new GuzzleHttp\Client();

        echo "\n > Getting items from category number ".$this->category->code." (page $this->currentPage) \n";

        $request = $guzzle->createRequest('GET', 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$this->category->code.'&page='.$this->currentPage, [
            'headers' => [
                'User-Agent'  => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',
                'Accept'      => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Referrer'    => 'http://www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$this->category->code,
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
            $totalCurrentPage = (($to - $from) + 1);
        } else {
            return 'preg_match_all() failed';
        }

        for ($i = 7; $i <= ($totalCurrentPage + 7); $i++) {
            $itemCrawler = $crawler->filter('table.w100 > tr:nth-child('.$i.') > td:nth-child(1) > div:nth-child(1) > table:nth-child(1) > tr:nth-child(2) > td:nth-child(1)');
            $dataToBeHashed = $crawler->filter('table.w100 > tr:nth-child('.$i.') > td:nth-child(1) > div:nth-child(1) > table:nth-child(1)')->html();
            $hash = Hash::make($dataToBeHashed);

            foreach ($itemCrawler->filter('span.info-element-title') as $x => $node) {
                $title = $node->nodeValue;
                $text = $itemCrawler->filter('span.info-element-text')->eq($x)->text();

                if (preg_match('/Nº Venda/i', $title)) {
                    preg_match_all('/\d{1,}/', $text, $match);

                    if (count($match[0]) === 3) {
                        $taxOffice = $match[0][0];
                        $year = $match[0][1];
                        $itemId = $match[0][2];

                        $rawItem = RawData::find($taxOffice.'.'.$year.'.'.$itemId);

                        if (isset($rawItem)) {
                            if (!Hash::check($dataToBeHashed, $rawItem->hash)) {
                                Bus::dispatch(new BackupItemPageJob($this->category->id, $taxOffice, $year, $itemId, $hash, true));

                                echo "\n *** Item $taxOffice.$year.$itemId needs to be updated *** \n";
                            }
                        } else {
                            Bus::dispatch(new BackupItemPageJob($this->category->id, $taxOffice, $year, $itemId, $hash, false));

                            echo "\n *** New item found: $taxOffice.$year.$itemId *** \n";
                        }

                        break 1;
                    }
                }
            }
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
        $msg .= ' - Categoria '.$this->category;
        $msg .= ' - Página actual '.$this->currentPage;

        app('LogImport')->error($msg);
    }
}
