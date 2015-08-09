<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Vehicle;

use App\Extractors\ExtractorInterface;
use App\Models\Items\Attributes\VehicleModel;
use App\Helpers\Text;

/**
 * This is the model extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ModelExtractor implements ExtractorInterface
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * The vehicle's models.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $models;

    /**
     * Create a new model extractor instance.
     *
     * @param array $params
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->models = VehicleModel::ofMake($params[1])->get();
    }

    /**
     * Extract the model.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->models as $model) {
            if (preg_match("/$model->name/ui", $this->str)) {
                return $model->id;
            }
        }
    }
}
