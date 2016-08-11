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

        $joborder = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->where('tblJobOrder.boolIsOrderAccepted', '!=', '1')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get();

        $joborderongoing = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->where('tblJobOrder.boolIsOrderAccepted', '=', '1')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get();      

           
        return view('dashboard')
             ->with('joborder', $joborder)
             ->with('joborderongoing', $joborderongoing);
    }
}