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

use App\Extractors\CorporateShareExtractorWrapper;
use App\Jobs\Job;
use App\Models\Items\Attributes\Corporate;
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
     *
     * @return void
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
        print "\n > Extracting corporate share attributes of $this->code ... \n";

        foreach ($this->description as $value) {

            // Try to extract the nif
            $this->attributes['corporate_nif'] = $this->extractor->nif($value);

            // Check if the nif was extracted
            if (isset($this->attributes['corporate_nif'])) {

                // Create a new corporate share
                $corporateShare = CorporateShare::create($this->attributes);

                // Set the polymorphic relationship
                Item::setPolymorphicRelation($this->code, $corporateShare);

                // Get a corporate with the extracted nif. Otherwise, create
                // a new corporate record on the database
                $corporateInfo = $this->getCorporateInfo();
                if (isset($corporateInfo)) {
                    $corporate = Corporate::firstOrCreate($corporateInfo);

                    // Update the item's title
                    $corporateShare->item->update([
                        'title' => $this->generateTitle($corporate),
                    ]);
                }

                break;
            }
        }
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
     * @return array|null
     */
    private function getCorporateInfo()
    {
        $client = new GuzzleHttp\Client();
        $params = [
            'json' => '1',
            'q'    => $this->attributes['corporate_nif'],
            'key'  => env('NIF_PT_API_KEY', null),
        ];

        $response = $client->get('http://www.nif.pt', ['query' => $params]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody());

            if ($data->result === 'success') {
                $attr = $data->records->{$this->attributes['corporate_nif']};

                return [
                    'nif'         => $this->attributes['corporate_nif'],
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
