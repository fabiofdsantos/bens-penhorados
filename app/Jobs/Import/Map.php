<?php

namespace App\Jobs\Import;

use App\Jobs\Job;
use App\Models\RawData;
use GuzzleHttp;

class Map extends Job
{
    /**
     * The list of locations.
     *
     * @var array
     */
    protected $locations;

    /**
     * The list of items on the database.
     *
     * @var array
     */
    protected $existingItems;

    /**
     * Create a new job instance.
     *
     * @param array $locations
     * @param array $existingItems
     */
    public function __construct($locations, $existingItems)
    {
        $this->locations = $locations;
        $this->existingItems = $existingItems;
    }
    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $guzzle = new GuzzleHttp\Client();

        print " > Getting items from map ... \n";

        foreach ($locations as $location) {
            $request = $guzzle->createRequest('POST', 'http://www.e-financas.gov.pt/fovendas/proxy.jsp?http://ags/arcgis/rest/services/vendas/fovendas/MapServer/0/query', [
                'headers' => [
                    'User-Agent'  => '"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0"',
                    'Accept'      => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Referrer'    => 'http://www.e-financas.gov.pt/fovendas/mapa.jsp?iddistrito='.$location,
                ],
                'body' => [
                    'where'          => 'EDISTRTO LIKE \''.$location.'\'',
                    'outFields'      => 'EREPFIN,DANO,XNRORDEM,XLAT,XLON',
                    'returnGeometry' => 'false',
                    'f'              => 'json',
                ],
                'debug' => false,
            ]);

            $request->getQuery()->setEncodingType(false);
            $response = $guzzle->send($request);

            $result = json_decode($response->getBody());

            $i = 0;
            foreach ($result->features as $item) {
                $itemCode = $item->attributes->EREPFIN.'.'.$item->attributes->DANO.'.'.$item->attributes->XNRORDEM;

                if (!in_array($itemCode, $existingItems)) {
                    $rawItem = new RawData();
                    $rawItem->code = $itemCode;
                } else {
                    $rawItem = RawData::findOrFail($itemCode);
                }

                $rawItem->lat = $item->attributes->XLAT;
                $rawItem->lng = $item->attributes->XLON;
                $rawItem->save();

                $i++;
            }
        }

        print " \n *** Done. $i items found! *** \n\n";
    }
}
