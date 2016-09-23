<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Redirect;
use Validator;
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
    public function custom(Request $request)
    {
        // 1 - Weekly
        // 2 - Monthly
        // 3 - Quarterly
        // 4 - Annually
        $intRepType = $request->input('selType');
        $datRepFrom = $request->input('datFrom');
        $datRepTo = $request->input('datTo');

        $rules = array(
            'datFrom' => 'required|date|before:today',
            'datTo' => 'required|date|after:datFrom',
            'selType' => 'required'
        );
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        $niceNames = array(
            'intRepType' => 'Report Type',
            'datFrom' => 'From',
            'datTo' => 'To'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            // [0] - DAY
            // [1] - MONTH
            // [2] - YEAR
            $convertedFrom = date('M j, Y',strtotime($datRepFrom));
            $convertedTo = date('M j, Y',strtotime($datRepTo));
            if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        WEEK(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                GROUP BY    s.strSegmentID, WEEK(jo.dtFinished)
                                ORDER BY    jo.dtFinished',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-product',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        MONTHNAME(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                GROUP BY    s.strSegmentID, MONTH(jo.dtFinished)
                                ORDER BY    jo.dtFinished',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-product',['data' => $qrMonthly, 'ReportType' => 'Monthly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        QUARTER(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                GROUP BY    s.strSegmentID, QUARTER(jo.dtFinished)
                                ORDER BY    jo.dtFinished',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-product',['data' => $qrQuarterly, 'ReportType' => 'Quarter Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        YEAR(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                GROUP BY    s.strSegmentID, YEAR(jo.dtFinished)
                                ORDER BY    jo.dtFinished',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-product',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            }
        }
    }
    public function generate(Request $request)
    {
        // 1 - Weekly
        // 2 - Monthly
        // 3 - Quarterly
        // 4 - Annually
        $intRepType = $request->input('tabular');

        $rules = array(
            'tabular' => 'required'
        );
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        $niceNames = array(
            'intRepType' => 'Report Type',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        WEEK(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    s.strSegmentID, WEEK(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-product-generate',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        MONTHNAME(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 
                                GROUP BY    s.strSegmentID, MONTH(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-product-generate',['data' => $qrMonthly, 'ReportType' => 'Monthly Report', 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        QUARTER(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1 
                                GROUP BY    s.strSegmentID, QUARTER(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-product-generate',['data' => $qrQuarterly, 'ReportType' => 'Quarter Report', 'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT s.strSegmentID,
                                        s.strSegmentName, 
                                        SUM(js.intQuantity) AS TimesOrdered,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Amount,
                                        YEAR(jo.dtFinished) AS columnOne
                                FROM        tbljoborder AS jo LEFT JOIN
                                            tbljospecific as js 
                                                ON jo.strJobOrderID= js.strJobOrderFK
                                INNER JOIN  tblSegment AS s
                                                ON js.strJOSegmentFK = s.strSegmentID
                                WHERE       jo.boolIsOrderAccepted = 1
                                GROUP BY    s.strSegmentID, YEAR(jo.dtFinished)
                                ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-product-generate',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            }
        }
    }
}
