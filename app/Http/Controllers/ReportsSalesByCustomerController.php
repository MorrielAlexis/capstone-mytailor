<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;
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
        $qrDaily = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        CONCAT(DAYNAME(jo.dtOrderDate)," ",MONTH(jo.dtOrderDate),"-",DAY(jo.dtOrderDate)) AS Day
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, jo.dtOrderDate
                                ORDER BY    jo.dtOrderDate');
        $qrMonthly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        MONTHNAME(jo.dtOrderDate) AS Month
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, MONTH(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
        $qrWeekly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        WEEK(jo.dtOrderDate) AS Week
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, WEEK(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
        $qrQuarterly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        QUARTER(jo.dtOrderDate) AS Quarter
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, QUARTER(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
        $qrAnnually = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        YEAR(jo.dtOrderDate) AS Year
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, YEAR(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
        $qrDays = DB::select('SELECT DISTINCT (CONCAT(DAYNAME(dtOrderDate)," ",MONTH(dtOrderDate),"-",DAY(dtOrderDate))) AS Day FROM tbljoborder WHERE dtOrderDate IS NOT NULL');
        $qrMonths = DB::select('SELECT DISTINCT(MONTHNAME(dtOrderDate)) AS Month FROM tbljoborder WHERE dtOrderDate IS NOT NULL');
        $qrWeeks = DB::select('SELECT DISTINCT(WEEK(dtOrderDate)) AS Week FROM tbljoborder WHERE dtOrderDate IS NOT NULL');
        $qrQuarter = DB::select('SELECT DISTINCT(QUARTER(dtOrderDate)) AS Quarter FROM tbljoborder WHERE dtOrderDate IS NOT NULL');
        $qrAnnual = DB::select('SELECT DISTINCT(YEAR(dtOrderDate)) AS Annual FROM tbljoborder WHERE dtOrderDate IS NOT NULL');
        return view('reports.reports-sales-by-customer-v2')
                    ->with('Daily', $qrDaily)
                    ->with('Monthly', $qrMonthly)
                    ->with('Quarterly', $qrQuarterly)
                    ->with('Weekly', $qrWeekly)
                    ->with('Annually', $qrAnnually)
                    ->with('Months', $qrMonths)
                    ->with('Weeks', $qrWeeks)
                    ->with('Quarter', $qrQuarter)
                    ->with('Annual', $qrAnnual)
                    ->with('Days', $qrDays);
    }

    public function generatePDF() 
    {
        $pdf = PDF::loadView('pdf.salesreport-customer')
            ->setPaper('Letter')
            ->setOrientation('portrait');

        return $pdf->stream();
    }//generates the pdf

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
            if($intRepType == 0){
                 $qrDaily = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        CONCAT(DAYNAME(jo.dtOrderDate)," ",MONTH(jo.dtOrderDate),"-",DAY(jo.dtOrderDate)) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate AND (jo.dtOrderDate BETWEEN ? AND ?)
                                GROUP BY    cn.strCompanyID, ci.strIndivID, jo.dtOrderDate
                                ORDER BY    jo.dtOrderDate',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-customer',['data' => $qrDaily, 'ReportType' => 'Daily Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        WEEK(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate AND (jo.dtOrderDate BETWEEN ? AND ?)
                                GROUP BY    cn.strCompanyID, ci.strIndivID, WEEK(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-customer',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        MONTHNAME(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1  AND jo.dtOrderDate AND (jo.dtOrderDate BETWEEN ? AND ?)
                                GROUP BY    cn.strCompanyID, ci.strIndivID, MONTH(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-customer',['data' => $qrMonthly, 'ReportType' => 'Monthly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        QUARTER(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1  AND jo.dtOrderDate AND (jo.dtOrderDate BETWEEN ? AND ?)
                                GROUP BY    cn.strCompanyID, ci.strIndivID, QUARTER(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-customer',['data' => $qrQuarterly, 'ReportType' => 'Quarterly Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        YEAR(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1  AND jo.dtOrderDate AND (jo.dtOrderDate BETWEEN ? AND ?)
                                GROUP BY    cn.strCompanyID, ci.strIndivID, YEAR(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate',[$datRepFrom,$datRepTo]);
                $pdf = PDF::loadView('pdf.salesreport-customer',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'datFrom' => $convertedFrom, 'datTo' => $convertedTo, 'Name' => "Year"])
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
            if($intRepType == 0){
                $qrDaily = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        CONCAT(DAYNAME(jo.dtOrderDate)," ",MONTH(jo.dtOrderDate),"-",DAY(jo.dtOrderDate)) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate
                                GROUP BY    cn.strCompanyID, ci.strIndivID, jo.dtOrderDate
                                ORDER BY    jo.dtOrderDate');
                $pdf = PDF::loadView('pdf.salesreport-customer-generate',['data' => $qrDaily, 'ReportType' => 'Daily Report', 'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 1) {
                // Weekly
                $qrWeekly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        WEEK(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate 
                                GROUP BY    cn.strCompanyID, ci.strIndivID, WEEK(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
                $pdf = PDF::loadView('pdf.salesreport-customer-generate',['data' => $qrWeekly, 'ReportType' => 'Weekly Report', 'Name' => "Week"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 2){
                // Monthly
                $qrMonthly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        MONTHNAME(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1 AND jo.dtOrderDate 
                                GROUP BY    cn.strCompanyID, ci.strIndivID, MONTH(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
                $pdf = PDF::loadView('pdf.salesreport-customer-generate',['data' => $qrMonthly, 'ReportType' => 'Monthly Report',  'Name' => ""])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 3){
                // Quarterly
                $qrQuarterly = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        QUARTER(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1  AND jo.dtOrderDate 
                                GROUP BY    cn.strCompanyID, ci.strIndivID, QUARTER(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
                $pdf = PDF::loadView('pdf.salesreport-customer-generate',['data' => $qrQuarterly, 'ReportType' => 'Quarterly Report',  'Name' => "Quarter"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            } else if ($intRepType == 4){
                // Yearly
                $qrAnnually = DB::select('SELECT cn.strCompanyName, 
                                        CONCAT(ci.strIndivFName," ",ci.strIndivLName) AS IndividualCustomer,
                                        SUM(js.intQuantity * js.dblUnitPrice) AS Total,
                                        SUM(js.intQuantity * cd.dblChargeDetPrice) AS Fee,
                                        CONCAT(e.strEmpFName," ",e.strEmpLName) AS EmployeeName,
                                        YEAR(jo.dtOrderDate) AS columnOne
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
                                WHERE       jo.boolIsOrderAccepted = 1  AND jo.dtOrderDate 
                                GROUP BY    cn.strCompanyID, ci.strIndivID, YEAR(jo.dtOrderDate)
                                ORDER BY    jo.dtOrderDate');
                $pdf = PDF::loadView('pdf.salesreport-customer-generate',['data' => $qrAnnually, 'ReportType' => 'Annual Report', 'Name' => "Year"])
                    ->setPaper('Letter')
                    ->setOrientation('portrait');
                return $pdf->stream();
            }
        }
    }
}
