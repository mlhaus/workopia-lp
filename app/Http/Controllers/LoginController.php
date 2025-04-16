<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if(Auth::attempt($validatedData)) {
            $request->session()->regenerate();
//            return redirect()->route('home')->with('success', 'You are logged in.');
            // To redirect users back to their originally requested route after logging in,
            // you can use Laravel's intended redirect feature. Laravel stores the
            // intended URL in the session when an unauthorized user is redirected to the
            // login page (this happens automatically if you're using Laravel's authentication middleware).
            return redirect()->intended(route('home'))->with('success', 'You are logged in.');
        } else {
    //            return back()->with('error', 'The provided credentials do not match our records.');
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
        }

    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
