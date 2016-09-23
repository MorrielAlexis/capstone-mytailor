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
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJO_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJO_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->orderby('tblJobOrder.strJobOrderID')
            ->select('tblcustindividual.*', 'tblJobOrder.*')
            ->where('boolIsOnline', 1)
            ->get(); 

        $joborderongoing = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->where('tblJobOrder.boolIsOrderAccepted', '=', '1')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get();

        $results = \DB::table('tblJOPayment AS a')
            ->join('tblJobOrder as b','a.strTransactionFK',  '=' , 'b.strJobOrderID')
            ->join('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
            ->select(\DB::raw('CONCAT(c.strIndivFName, " " , c.strIndivMName, " " , c.strIndivLName) as custName'),'a.dblOutstandingBal as balance', 'a.dtPaymentDueDate as dueDate')
            ->orderBy('strIndivID', 'desc')
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

        $totalEmp = \DB::table('tblEmployee')
            ->select('strEmployeeID', \DB::raw('count(*) as totalEmps'))
            ->orderBy('created_at', 'desc')
            ->orderBy('strEmployeeID', 'desc')
            ->get();

        $topCustomers = \DB::select('SELECT Concat(tblCustIndividual.strIndivFName, " " , tblCustIndividual.strIndivMName, " " , tblCustIndividual.strIndivLName)as name, COUNT(strIndivID) as ctr FROM tblJobOrder,tblCustIndividual WHERE tblCustIndividual.strIndivID = tblJobOrder.strJO_CustomerFK ORDER BY ctr');
    

        return view('dashboard')
             ->with('joborder', $joborder)
             ->with('results', $results)
             ->with('joborderprog', $joborderprog)
             ->with('neardue', $neardue)
             ->with('totalCustIndiv', $totalCustIndiv)
             ->with('totalCustComp', $totalCustComp)
             ->with('totalEmp', $totalEmp)
             ->with('topCustomers', $topCustomers);
             // ->with('totalSegments', $totalSegments);
    }
}