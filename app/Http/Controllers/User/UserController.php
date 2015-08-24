<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers\User;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

/**
 * This is the user controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class UserController extends Controller
{
    /**
     * Show account details for the currently logged in user.
     *
     * @return Response
     */
    public function show()
    {
        $data = [
            'name'  => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        return response()->json($data, 200);
    }

    /**
     * Edit account details of the currently logged in user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|max:255',
            'email'           => 'required|email|max:255|unique:users',
            'password'        => 'required|min:6',
        ]);

        Auth::user()->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'success' => 'Your account was successfully updated!',
        ], 200);
    }
}
