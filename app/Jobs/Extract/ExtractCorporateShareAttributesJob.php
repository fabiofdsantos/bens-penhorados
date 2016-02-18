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

use App\Extractors\Wrappers\CorporateShareExtractorWrapper;
use App\Jobs\Job;
use App\Models\Attributes\CorporateShare\Corporate;
use App\Models\Items\CorporateShare;
use App\Models\Items\Item;
use GuzzleHttp;

/**
 * This is the extract corporate share attributes job.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ExtractCorporateShareAttributesJob extends Job
{
    /**
     * The corporate share extractor.
     *
     * @var CorporateShareExtractorWrapper
     */
    protected $extractor;

    /**
     * The attributes that should be extracted.
     *
     * @var array
     */
    protected $attributes = [
        'corporate_nif'  => null,
    ];

    /**
     * The corporate share code.
     *
     * @var string
     */
    protected $code;

    /**
     * The corporate share description.
     *
     * @var array
     */
    protected $description;

    /**
     * Create a new job instance.
     *
     * @param string $code
     * @param array  $description
     */
    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
        $this->extractor = new CorporateShareExtractorWrapper();
    }

    /**
     * Execute the job.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "\n > Extracting corporate share attributes of $this->code ... \n";

        // Try to extract the nif
        $this->attributes['corporate_nif'] = $this->extractor->nif($this->description);

        // Check if the nif was extracted
        if (isset($this->attributes['corporate_nif'])) {

            // Get a corporate with the extracted nif. Otherwise, create
            // a new corporate record on the database
            $corporateInfo = $this->getCorporateInfo($this->attributes['corporate_nif']);

            if (isset($corporateInfo)) {
                $corporate = Corporate::firstOrCreate($corporateInfo);
            }

            // Create a new corporate share
            $corporateShare = CorporateShare::create($this->attributes);

            // Set the polymorphic relationship
            Item::setPolymorphicRelation($this->code, $corporateShare);

            // Update the item's title
            //$corporateShare->item->update([
            //    'title' => $this->generateTitle($corporate),
            //]);
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
        $msg .= ' - Código: '.$this->$code;

        app('LogExtract')->error($msg);
    }

    /**
     * Generate the corporate share title.
     *
     * @param Corporate $corporate
     *
     * @return string
     */
    private function generateTitle(Corporate $corporate)
    {
        return $corporate->getAttribute('name');
    }

    /**
     * Get the corporate's attributes via nif.pt API.
     *
     * @param int $nif
     *
     * @return array|null
     */
    private function getCorporateInfo($nif)
    {
        $client = new GuzzleHttp\Client();
        $params = [
            'json' => '1',
            'q'    => $nif,
            'key'  => env('NIF_PT_API_KEY', null),
        ];

        $response = $client->get('http://www.nif.pt', ['query' => $params]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody());

            if ($data->result === 'success') {
                $attr = $data->records->{$nif};

                return [
                    'nif'         => $nif,
                    'name'        => $attr->title,
                    'address'     => $attr->address,
                    'postal_code' => "$attr->pc4-$attr->pc3",
                    'city'        => $attr->city,
                    'cae'         => $attr->cae,
                    'activity'    => $attr->activity,
                    'nature'      => $attr->structure->nature,
                    'capital'     => $attr->structure->capital,
                    'is_active'   => ($attr->status === 'active') ? true : false,
                    'email'       => $attr->contacts->email,
                    'phone'       => $attr->contacts->phone,
                    'website'     => $attr->contacts->website,
                    'fax'         => $attr->contacts->fax,
                ];
            }
        }
    }
}
