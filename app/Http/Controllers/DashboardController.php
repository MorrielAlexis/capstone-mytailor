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

        $joborderprog = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->where('tblJobOrder.boolIsOrderAccepted', '=', '1')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get();

        $neardue = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->where('tblJobOrder.boolIsOrderAccepted', '=', '1')
            ->whereRaw('DATEDIFF(tblJobOrder.dtOrderExpectedToBeDone, CurDate()) <= 7')
            ->whereRaw('DATEDIFF(tblJobOrder.dtOrderExpectedToBeDone, CurDate()) > 0')
            ->OrderBy('tblJobOrder.dtOrderExpectedToBeDone')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get();      

         $totalCustIndiv = \DB::table('tblCustIndividual')
            ->select('strIndivID', \DB::raw('count(*) as ctr'))
            ->orderBy('created_at', 'desc')
            ->orderBy('strIndivID', 'desc')
            ->get();

         $totalCustComp = \DB::table('tblCustCompany')
            ->select('strCompanyID', \DB::raw('count(*) as totalCompanies'))
            ->orderBy('created_at', 'desc')
            ->orderBy('strCompanyID', 'desc')
            ->get();

           
        return view('dashboard')
             ->with('joborder', $joborder)
             ->with('joborderongoing', $joborderongoing)
             ->with('joborderprog', $joborderprog)
             ->with('neardue', $neardue)
             ->with('totalCustIndiv', $totalCustIndiv)
             ->with('totalCustComp', $totalCustComp);
    }
}