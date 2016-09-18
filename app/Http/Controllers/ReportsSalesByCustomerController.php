<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsSalesByCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrMonthly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        MONTHNAME(jo.dtFinished) AS Month
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                LEFT JOIN   tblCustCompany AS cn
                                                ON jo.strJO_CustomerCompanyFK = cn.strCompanyID
                                LEFT JOIN   tblCustIndividual AS ci
                                                ON jo.strJO_CustomerFK = ci.strIndivID
                                LEFT JOIN   tblEmployee AS e
                                                ON js.strEmployeeNameFK = e.strEmployeeID
                                LEFT JOIN   tblChargeDetail AS cd
                                                ON js.strJOSegmentFK = cd.strChargeDetSegFK
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    cn.strCompanyID, ci.strIndivID, MONTH(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
        $qrWeekly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        WEEK(jo.dtFinished) AS Week
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                LEFT JOIN   tblCustCompany AS cn
                                                ON jo.strJO_CustomerCompanyFK = cn.strCompanyID
                                LEFT JOIN   tblCustIndividual AS ci
                                                ON jo.strJO_CustomerFK = ci.strIndivID
                                LEFT JOIN   tblEmployee AS e
                                                ON js.strEmployeeNameFK = e.strEmployeeID
                                LEFT JOIN   tblChargeDetail AS cd
                                                ON js.strJOSegmentFK = cd.strChargeDetSegFK
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    cn.strCompanyID, ci.strIndivID, WEEK(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
        $qrQuarterly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        QUARTER(jo.dtFinished) AS Quarter
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                LEFT JOIN   tblCustCompany AS cn
                                                ON jo.strJO_CustomerCompanyFK = cn.strCompanyID
                                LEFT JOIN   tblCustIndividual AS ci
                                                ON jo.strJO_CustomerFK = ci.strIndivID
                                LEFT JOIN   tblEmployee AS e
                                                ON js.strEmployeeNameFK = e.strEmployeeID
                                LEFT JOIN   tblChargeDetail AS cd
                                                ON js.strJOSegmentFK = cd.strChargeDetSegFK
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    cn.strCompanyID, ci.strIndivID, Quarter(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
        $qrAnnually = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        YEAR(jo.dtFinished) AS Year
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                LEFT JOIN   tblCustCompany AS cn
                                                ON jo.strJO_CustomerCompanyFK = cn.strCompanyID
                                LEFT JOIN   tblCustIndividual AS ci
                                                ON jo.strJO_CustomerFK = ci.strIndivID
                                LEFT JOIN   tblEmployee AS e
                                                ON js.strEmployeeNameFK = e.strEmployeeID
                                LEFT JOIN   tblChargeDetail AS cd
                                                ON js.strJOSegmentFK = cd.strChargeDetSegFK
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    cn.strCompanyID, ci.strIndivID, YEAR(jo.dtFinished)
                                ORDER BY    jo.dtFinished');

        $qrMonths = DB::select('SELECT DISTINCT(MONTHNAME(dtFinished)) AS Month FROM tbljoborder');
        $qrWeeks = DB::select('SELECT DISTINCT(WEEK(dtFinished)) AS Week FROM tbljoborder');
        $qrQuarter = DB::select('SELECT DISTINCT(QUARTER(dtFinished)) AS Quarter FROM tbljoborder');
        $qrAnnual = DB::select('SELECT DISTINCT(YEAR(dtFinished)) AS Annual FROM tbljoborder');
        return view('reports.reports-sales-by-customer-v2')
                    ->with('Monthly', $qrMonthly)
                    ->with('Quarterly', $qrQuarterly)
                    ->with('Weekly', $qrWeekly)
                    ->with('Annually', $qrAnnually)
                    ->with('Months', $qrMonths)
                    ->with('Weeks', $qrWeeks)
                    ->with('Quarter', $qrQuarter)
                    ->with('Annual', $qrAnnual);
    }

    public function generatePDF() 
    {
        $pdf = PDF::loadView('pdf.salesreport-customer')
            ->setPaper('Letter')
            ->setOrientation('portrait');

        return $pdf->stream();
    }//generates the pdf

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
