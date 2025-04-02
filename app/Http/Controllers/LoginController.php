<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    // @desc   Show user registration form
    // @route  GET /login
    public function login() : View
    {
        return view('auth.login');
    }

    // @desc   Process user registration form
    // @route  POST /login
    public function authenticate(Request $request) : ?RedirectResponse
    {
        return null;
    }
}
