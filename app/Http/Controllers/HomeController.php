<?php

namespace App\Http\Controllers;

use View;
use Input;
use Illuminate\Http\Request;

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
    	$user = Input::get('username');
    	$pass = Input::get('password');

    	return View::make('layouts.master');
    }
}
