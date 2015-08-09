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
use Carbon\Carbon;

/**
 * This is the datetime extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class DateTimeExtractor implements ExtractorInterface
{
    const REGEX_DATE = '/\d+\-\d+\-\d+/';
    const REGEX_TIME = '/\d+\:\d+/';

    /**
     * The input string.
     *
     * @var string
     */
    protected $str;

    /**
     * Create a new datetime extractor instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the datetime.
     *
     * @return Carbon|null
     */
    public function extract()
    {
        if (preg_match(self::REGEX_DATE, $this->str, $match_date)) {
            if (preg_match(self::REGEX_TIME, $this->str, $match_time)) {
                $datetime = $match_date[0].'-'.$match_time[0];

                return Carbon::createFromFormat('Y-m-d-H:i', $datetime);
            } else {
                $datetime = $match_date[0];

                return Carbon::createFromFormat('Y-m-d', $datetime);
            }
        }
    }
}
