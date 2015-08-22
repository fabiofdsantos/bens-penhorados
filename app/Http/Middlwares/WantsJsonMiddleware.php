<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

/**
 * This is the wants json middleware.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class WantsJsonMiddleware
{
    /**
     * Run the request filter.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->wantsJson()) {
            return $next($request);
        }

        return view('index');
    }
}
