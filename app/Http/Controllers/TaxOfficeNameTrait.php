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
 * This is the tax office name trait.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
trait TaxOfficeNameTrait
{
    /**
     * Get the tax office name.
     *
     * @param \Illuminate\Database\Eloquent\Collection $office
     *
     * @return string
     */
    public static function getTaxOfficeName($office)
    {
        $name = $office->code.' - ';
        $name .= $office->municipality->name;

        if ($office->number) {
            $name .= ' ('.$office->number.')';
        }

        return $name;
    }
}
