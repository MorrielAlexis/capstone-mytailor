<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use Auth;

class DashboardController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash()
    {
        //$user = Auth::user();
        return view('dashboard');
            //->with('user', $user);
    }
}