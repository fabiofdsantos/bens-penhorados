<?php

namespace App\Jobs\Import;

use Symfony\Component\DomCrawler\Crawler;
use App\Jobs\Job;
use GuzzleHttp;
use DB;
use Bus;

/**
 * Description here...
 */
class Website extends Job
{
    public function handle()
    {
        $categories = DB::table('raw_data_categories')->lists('code');
        $existingItems = DB::table('raw_data')->lists('hash', 'code');

        $guzzle = new GuzzleHttp\Client();

        print "\n > Getting items from all categories ... \n";

        foreach ($categories as $category) {
            $request = $guzzle->createRequest('GET', 'www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$category, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Referer' => 'http://www.e-financas.gov.pt/vendas/consultaVendasCursoForm.action?tipoConsulta='.$category,
                ],
                'debug' => false,
                ]);

            $response = $guzzle->send($request);

            $crawler = new Crawler((string) $response->getBody());

            $input = $crawler->filter('.right')->text();
            preg_match_all('/\d{1,}/', $input, $output);

            if (count($output[0]) == 2) {
                $lastPage = $output[0][1];
            } else {
                return 'preg_match_all() failed';
            }

            for ($currentPage = 1; $currentPage <= $lastPage; $currentPage++) {
                Bus::dispatch(new WebsiteExtended($category, $existingItems, $currentPage));
            }
        }
    }
}
