<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

/**
 * This is the location trait.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
trait LocationTrait
{
    /**
     * Get the location.
     *
     * @param \App\Models\Items\Item $generic
     *
     * @return string
     */
    public static function getLocation($generic)
    {
        $location = $generic->municipality()->pluck('name');
        $location .= ', '.$generic->district()->pluck('name');

        return $location;
    }
}
