<?php

namespace App\Http\Controllers;

use View;
use Input;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showWelcome()
    {
    	return View::make('login');
    }

    public function LogIn()
    {
    	$user = Input::get('email');
    	$pass = Input::get('password');

        if (Auth::attempt(['email' => $user, 'password' => $pass])) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }else{
            return redirect('/')->with('flash_message', 'Invalid Credentials.');
        }
    }

    public function LogOut()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }
    }
}
