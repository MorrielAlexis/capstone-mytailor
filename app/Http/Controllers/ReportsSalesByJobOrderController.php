<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsSalesByJobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrMonthly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        CONCAT(MONTHNAME(jo.dtFinished),"-",YEAR(CURDATE())) as Month,
                                        MONTH(jo.dtFinished) AS MonthNumber
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
                                                        
                                        WHERE       jo.boolIsOrderAccepted = 1 AND YEAR(dtFinished) = YEAR(CURDATE())
                                        GROUP BY    MONTH(jo.dtFinished)
                                        ORDER BY    jo.dtFinished;
                                ');
        $qrQuarterly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        QUARTER(jo.dtFinished) as Quarter
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
                                                        
                                        WHERE       jo.boolIsOrderAccepted = 1 AND YEAR(dtFinished) = YEAR(CURDATE())
                                        GROUP BY    QUARTER(jo.dtFinished)
                                        ORDER BY    jo.dtFinished;
                                ');
        $qrWeekly = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        WEEK(jo.dtFinished) AS WeekNumber
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
                                                    
                                    WHERE       jo.boolIsOrderAccepted = 1 AND YEAR(dtFinished) = YEAR(CURDATE())
                                    GROUP BY    WEEK(jo.dtFinished)
                                    ORDER BY    jo.dtFinished;
                                ');
        $qrAnnually = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        YEAR(jo.dtFinished) AS YearNumber
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
                                                    
                                    WHERE       jo.boolIsOrderAccepted = 1 AND YEAR(dtFinished) = YEAR(CURDATE())
                                    GROUP BY    YEAR(jo.dtFinished)
                                    ORDER BY    jo.dtFinished;
                                ');
        $qrTransaction = DB::select('SELECT jo.strJobOrderId, 
                                            cn.strCompanyName, 
                                            CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                            SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                            SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                            CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                            CONCAT(MONTHNAME(jo.dtFinished)," ",DAY(jo.dtFinished),", ",YEAR(jo.dtFinished)) AS Finished
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
                                    GROUP BY    js.strJobOrderFK
                                    ORDER BY    jo.strJobOrderId
                                                    ');
        return view('reports.reports-sales-by-job-order-v2')
                    ->with('Monthly', $qrMonthly)
                    ->with('Quarterly', $qrQuarterly)
                    ->with('Weekly', $qrWeekly)
                    ->with('Annually', $qrAnnually)
                    ->with('Transaction', $qrTransaction);
    }

    public function generatePDF() 
    {
        $pdf = PDF::loadView('pdf.salesreport-joborder')
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
