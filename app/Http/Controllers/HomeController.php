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
            if(Auth::user()->type == 'employee'){
                return redirect()->intended('/dashboard');
            }else if(Auth::user()->type == 'customer'){
                return redirect()->intended('/online-home');
            }
            
        }else{
            return redirect('/')->with('flash_message', 'Invalid Credentials.')
                    ->withInput(Input::except('password'));
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
