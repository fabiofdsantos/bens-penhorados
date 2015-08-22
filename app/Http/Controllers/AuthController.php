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
class AuthController extends Controller
{
    /**
     * Create a new user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|max:255',
            'email'           => 'required|email|max:255|unique:users',
            'password'        => 'required|min:6',
            'password_again'  => 'required|same:password',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['msg' => 'Utilizador criado com sucesso!'], 200);
    }

    /**
     * Authenticate a registered user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return ['result' => 'success'];
        }

        return ['result' => 'fail'];
    }
}
