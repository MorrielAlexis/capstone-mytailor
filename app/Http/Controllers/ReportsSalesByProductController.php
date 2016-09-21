<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsSalesByProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $qrMonthly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        monthname(jo.dtFinished) AS MonthName
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    s.strSegmentID, MONTH(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
        $qrQuarterly = DB::select('SELECT   s.strSegmentID,
                                            s.strSegmentName, 
                                            SUM(js.intQuantity) AS TimesOrdered,
                                            SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                            QUARTER(jo.dtFinished) AS QuarterNumber
                                    FROM        tbljoborder AS jo LEFT JOIN
                                                tbljospecific as js 
                                                    ON jo.strJobOrderID= js.strJobOrderFK
                                    INNER JOIN  tblSegment AS s
                                                    ON js.strJOSegmentFK = s.strSegmentID
                                    WHERE       jo.boolIsOrderAccepted = 1
                                    GROUP BY    s.strSegmentID, QUARTER(jo.dtFinished)
                                    ORDER BY    jo.dtFinished');
        $qrWeekly = DB::select('SELECT  s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        WEEK(jo.dtFinished) AS WeekNumber
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    s.strSegmentID, WEEK(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
        $qrAnnually = DB::select('SELECT    s.strSegmentID,
                                            s.strSegmentName, 
                                            SUM(js.intQuantity) AS TimesOrdered,
                                            SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                            YEAR(jo.dtFinished) AS YearNumber
                                    FROM        tbljoborder AS jo LEFT JOIN
                                                tbljospecific as js 
                                                    ON jo.strJobOrderID= js.strJobOrderFK
                                    INNER JOIN  tblSegment AS s
                                                    ON js.strJOSegmentFK = s.strSegmentID
                                    WHERE       jo.boolIsOrderAccepted = 1
                                    GROUP BY    s.strSegmentID, YEAR(jo.dtFinished)
                                    ORDER BY    jo.dtFinished');
        $qrTransaction = DB::select('SELECT     s.strSegmentID,
                                                s.strSegmentName, 
                                                SUM(js.intQuantity) AS TimesOrdered,
                                                SUM(js.intQuantity * js.dblUnitPrice) AS Amount
                                                
                                        FROM        tbljoborder AS jo LEFT JOIN
                                                    tbljospecific as js 
                                                        ON jo.strJobOrderID= js.strJobOrderFK
                                        INNER JOIN  tblSegment AS s
                                                        ON js.strJOSegmentFK = s.strSegmentID
                                        WHERE       jo.boolIsOrderAccepted = 1
                                        GROUP BY    s.strSegmentID
                                        ORDER BY    s.strSegmentID');
        $qrMonths = DB::select('SELECT DISTINCT(MONTHNAME(dtFinished)) AS Month FROM tbljoborder');
        $qrWeeks = DB::select('SELECT DISTINCT(WEEK(dtFinished)) AS Week FROM tbljoborder');
        $qrQuarter = DB::select('SELECT DISTINCT(QUARTER(dtFinished)) AS Quarter FROM tbljoborder');
        $qrAnnual = DB::select('SELECT DISTINCT(YEAR(dtFinished)) AS Annual FROM tbljoborder');
        return view('reports.reports-sales-by-product-v2')
                    ->with('Monthly', $qrMonthly)
                    ->with('Quarterly', $qrQuarterly)
                    ->with('Weekly', $qrWeekly)
                    ->with('Annually', $qrAnnually)
                    ->with('Transaction', $qrTransaction)
                    ->with('Months', $qrMonths)
                    ->with('Weeks', $qrWeeks)
                    ->with('Quarter', $qrQuarter)
                    ->with('Annual', $qrAnnual);
    }

    public function generatePDF() 
    {
        $pdf = PDF::loadView('pdf.salesreport-product')
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
