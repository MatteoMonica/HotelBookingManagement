<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->all();

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        return Auth::logout();
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function getIDUser()
    {
        return Auth::id();
    }
}
