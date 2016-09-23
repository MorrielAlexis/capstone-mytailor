<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Redirect;
use Validator;
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

    public function generate(Request $request)
    {
        $intRepType = $request->input('tabular');

        $rules = array(
            'tabular' => 'required'
        );
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        $niceNames = array(
            'intRepType' => 'Report Type'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        WEEK(jo.dtFinished) AS columnOne
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
                                    ORDER BY    jo.dtFinished;');
                $pdf = PDF::loadView('pdf.salesreport-joborder-generate',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        MONTHNAME(jo.dtFinished) as columnOne,
                                        MONTH(jo.dtFinished) AS Month
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
                                        GROUP BY    MONTH(jo.dtFinished)
                                        ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-joborder-generate',['data' => $qrMonthly, 'ReportType' => 'Monthly Report', 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        QUARTER(jo.dtFinished) as columnOne
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
                                        GROUP BY    QUARTER(jo.dtFinished)
                                        ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-joborder-generate',['data' => $qrQuarterly, 'ReportType' => 'Quarter Report', 'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        YEAR(jo.dtFinished) AS columnOne
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
                                    GROUP BY    YEAR(jo.dtFinished)
                                    ORDER BY    jo.dtFinished');
                $pdf = PDF::loadView('pdf.salesreport-joborder-generate',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if($intRepType == 5){
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
                $pdf = PDF::loadView('pdf.salesreport-transaction-generate',['data' => $qrTransaction, 'ReportType' => 'Transactional Report', 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            }
        }
    }
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
            $convertedFrom = date('M j, Y',strtotime($datRepFrom));
            $convertedTo = date('M j, Y',strtotime($datRepTo));
            if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        WEEK(jo.dtFinished) AS columnOne
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
                                    WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                    GROUP BY    WEEK(jo.dtFinished)
                                    ORDER BY    jo.dtFinished
                                ',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-joborder',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        MONTHNAME(jo.dtFinished) as columnOne,
                                        MONTH(jo.dtFinished) AS Month
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
                                                        
                                        WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                        GROUP BY    MONTH(jo.dtFinished)
                                        ORDER BY    jo.dtFinished;
                                ',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-joborder',['data' => $qrMonthly, 'ReportType' => 'Monthly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        QUARTER(jo.dtFinished) as columnOne
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
                                                        
                                        WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                        GROUP BY    QUARTER(jo.dtFinished)
                                        ORDER BY    jo.dtFinished;
                                ',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-joborder',['data' => $qrQuarterly, 'ReportType' => 'Quarter Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT  SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        jo.dtFinished,
                                        YEAR(jo.dtFinished) AS columnOne
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
                                                    
                                    WHERE       jo.boolIsOrderAccepted = 1 AND (jo.dtFinished BETWEEN ? AND ?)
                                    GROUP BY    YEAR(jo.dtFinished)
                                    ORDER BY    jo.dtFinished;
                                ',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-joborder',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            }
        }
    }
}
