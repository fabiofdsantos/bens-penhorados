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
use App\Models\Items\Item;
use App\Models\RawData;
use GuzzleHttp;

/**
 * This is the import from map job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ImportFromMapJob extends Job
{
    /**
     * The list of locations.
     *
     * @var array
     */
    protected $locations;

    /**
     * Create a new job instance.
     *
     * @param array $locations
     */
    public function __construct($locations)
    {
        $this->locations = $locations;
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        $guzzle = new GuzzleHttp\Client();

        echo " > Getting items from map ... \n";

        $i = 0;
        foreach ($this->locations as $location) {
            $request = $guzzle->request('POST', 'http://www.e-financas.gov.pt/fovendas/proxy.jsp?http://ags/arcgis/rest/services/vendas/fovendas/MapServer/0/query', [
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

            foreach ($result->features as $item) {
                $itemCode = $item->attributes->EREPFIN.'.'.$item->attributes->DANO.'.'.$item->attributes->XNRORDEM;

                $rawItem = Item::find($itemCode);

                if (isset($rawItem)) {
                    $flag_coordChanged = false;

                    if ($rawItem->lat != $item->attributes->XLAT) {
                        $rawItem->lat = $item->attributes->XLAT;
                        $flag_coordChanged = true;
                    }

                    if ($rawItem->lng != $item->attributes->XLON) {
                        $rawItem->lng = $item->attributes->XLON;
                        $flag_coordChanged = true;
                    }

                    if ($flag_coordChanged) {
                        $rawItem->extracted = false;
                        $rawItem->save();
                    }
                } else {
                    $rawItem = new RawData();
                    $rawItem->code = $itemCode;
                    $rawItem->lat = $item->attributes->XLAT;
                    $rawItem->lng = $item->attributes->XLON;
                    $rawItem->extracted = false;
                    $rawItem->save();
                }
                $i++;
            }
        }

        echo " \n *** Done. $i items found! *** \n\n";
    }

    /**
     * Called when the job is failing.
     *
     * @return void
     */
    public function failed()
    {
        $msg = self::class;

        app('LogImport')->error($msg);
    }
}
