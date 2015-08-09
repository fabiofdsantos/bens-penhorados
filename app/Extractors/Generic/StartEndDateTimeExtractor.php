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
 * This is the start/end datetime extractor class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class StartEndDateTimeExtractor implements ExtractorInterface
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
     * Create a new start/end datetime extractor instance.
     *
     * @param array $params
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->str = Text::clean($params[0]);
    }

    /**
     * Extract the start/end datetime.
     *
     * @return array
     */
    public function extract()
    {
        $datetimes = [];
        if (preg_match_all(self::REGEX_DATE, $this->str, $match_date)) {
            preg_match_all(self::REGEX_TIME, $this->str, $match_time);

            $dt_start = $match_date[0][0].'-'.$match_time[0][0];
            $dt_end = $match_date[0][1].'-'.$match_time[0][1];

            $datetimes[0] = Carbon::createFromFormat('Y-m-d-H:i', $dt_start);
            $datetimes[1] = Carbon::createFromFormat('Y-m-d-H:i', $dt_end);
        } else {
            $datetimes[0] = null;
            $datetimes[1] = null;
        }

        return $datetimes;
    }
}
