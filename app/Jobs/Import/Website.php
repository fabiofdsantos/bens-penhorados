<?php

namespace App\Jobs\Import;

use App\Jobs\Job;
use GuzzleHttp;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class Website extends Job
{
    /**
     * The list of categories.
     *
     * @var array
     */
    protected $categories;

    /**
     * The number of the last page to be crawled.
     *
     * @var int
     */
    protected $lastPage;

    /**
     * Create a new job instance.
     *
     * @param array $categories
     * @param int $lastPage
     */
    public function __construct($categories, $lastPage)
    {
        $this->categories = $categories;
        $this->lastPage = $lastPage;
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $existingItems = DB::table('raw_data')->lists('hash', 'code');

        $guzzle = new GuzzleHttp\Client();

        foreach ($this->categories as $category) {
            $request = $guzzle->createRequest('GET', 'www.e-financas.gov.pt/vendas/consultaVendasCurso.action?tipoConsulta='.$category->code, [
                'headers' => [
                    'User-Agent'  => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',
                    'Accept'      => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Referrer'    => 'http://www.e-financas.gov.pt/vendas/consultaVendasCursoForm.action?tipoConsulta='.$category->code,
                ],
                'debug' => false,
                ]);

            $response = $guzzle->send($request);

            $crawler = new Crawler((string) $response->getBody());

            $input = $crawler->filter('.right')->text();
            preg_match_all('/\d{1,}/', $input, $output);

            if (is_null($this->lastPage)) {
                if (count($output[0]) == 2) {
                    $limitPage = $output[0][1];
                } else {
                    return 'preg_match_all() failed';
                }
            } else {
                $limitPage = $this->lastPage;
            }

            for ($currentPage = 1; $currentPage <= $limitPage; $currentPage++) {
                Bus::dispatch(new WebsiteExtended($category, $existingItems, $currentPage));
            }
        }
    }
}
