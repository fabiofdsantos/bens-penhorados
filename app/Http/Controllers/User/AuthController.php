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
 * This is the auth controller class.
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
     * @return Response|null
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

        if (isset($user)) {
            return response()->json([
                'success' => 'The user was successfully created!',
            ], 200);
        }
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
            return response()->json([
                'success' => 'The user is logged in!',
            ], 200);
        } else {
            return response()->json([
                'wrongCredentials' => 'Wrong username or password.',
            ], 401);
        }
    }

    /**
     * Check if a visitor is logged in as an user.
     *
     * @return Response|null
     */
    public function check()
    {
        return Auth::check() ? response()->json([
            'success' => 'The user is logged in!',
        ], 200) : null;
    }

    /**
     * Logout an user.
     *
     * @return void
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
    }
}
