<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Extractors\Generic;

use App\Extractors\AbstractExtractor;
use App\Helpers\Text;
use App\Models\Attributes\Generic\ItemTaxOffice;

/**
 * This is the tax office extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class TaxOfficeExtractor extends AbstractExtractor
{
    /**
     * The item's tax offices.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $taxOffices;

    /**
     * Create a new status extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
        $this->taxOffices = ItemTaxOffice::all();
    }

    /**
     * Extract the status.
     *
     * @return int|null
     */
    public function extract()
    {
        $this->str = Text::removeAccents($this->str);

        foreach ($this->taxOffices as $office) {
            if ($office->code === $this->str) {
                return $office->id;
            }
        }
    }
}
