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
use App\Helpers\Text;
use App\Models\Attributes\Vehicle\VehicleCategory;

/**
 * This is the category extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class CategoryExtractor implements ExtractorInterface
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * The vehicle's categories.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $categories;

    /**
     * Create a new category extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::removeAccents($params[0]);
        $this->categories = VehicleCategory::all();
    }

    /**
     * Extract the category.
     *
     * @return int|null
     */
    public function extract()
    {
        foreach ($this->categories as $category) {
            if (preg_match($category->regex, $this->str)) {
                return $category->id;
            }
        }
    }
}
