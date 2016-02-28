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

use Carbon\Carbon;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the generic page controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class GenericPageController extends Controller
{
    /**
     * Show both latest and items ending soon.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function load($slug)
    {
        $data['content'] = '';

        return view('generic', $data);
    }
}
