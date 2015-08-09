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

use App\Extractors\ExtractorInterface;
use App\Helpers\Text;

/**
 * This is the status extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class StatusExtractor implements ExtractorInterface
{
    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Create a new status extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the status.
     *
     * @return string
     */
    public function extract()
    {
        return $this->str;
    }
}
