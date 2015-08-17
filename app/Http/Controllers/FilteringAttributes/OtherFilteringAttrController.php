<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\FilteringAttributes;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the other filtering attributes controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class OtherFilteringAttrController extends Controller
{
    use GenericFilteringAttributesTrait;

    /**
     * Show a list of filtering attributes for others.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $districtId = (int) $request->input('district') ?: null;

        $data = [
            'generic' => self::getGenericFilteringAttr($districtId),
        ];

        return response()->json($data, 200);
    }
}
