<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Property;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;
use App\Models\Attributes\Property\LandRegistry;

/**
 * This is the land registry extractor extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class LandRegistryExtractor extends AbstractExtractor
{
    /**
     * The list of land registries.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $landRegistries;

    /**
     * Create a new land registry extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->landRegistries = LandRegistry::all();
    }

    /**
     * Extract the land registry.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->landRegistries as $landRegistry) {
            if (preg_match($landRegistry->regex, $this->str)) {
                return $landRegistry->id;
            }
        }
    }
}
