<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use PDF;
use DB;

use App\Individual;
use App\Employee;


use App\TransactionJobOrder;
use App\TransactionJobOrderPayment;
use App\TransactionJobOrderSpecifics;
use App\TransactionJobOrderSpecificsPattern;
use App\TransactionJobOrderMeasurementProfile;
use App\TransactionJobOrderMeasurementSpecifics;
use App\TransactionJobOrderReceipt;
use App\TransactionPaymentReceipt;


class PaymentIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search_custname = $request->input('cust_name');
        session(['search_name' => $search_custname]);


        return view('transaction-billingpayment-individual-home')
            ->with('search_name', $search_custname);
    }

    public function custInfo(Request $request)
    {

        $search_custname = $request->input('cust_name');
        session(['name' => $search_custname]);

        $customer_info = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->leftJoin('tblJOPayment AS c', 'b.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'), 'b.*', 'c.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $search_custname)
                ->first();

        $customer_orders = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->leftJoin('tblJOSpecific AS c', 'b.strJobOrderID', '=', 'c.strJobOrderFK')
                ->leftJoin('tblSegment AS d', 'c.strJOSegmentFK', '=', 'd.strSegmentID')
                ->leftJoin('tblGarmentCategory as e', 'd.strSegCategoryFK', '=', 'e.strGarmentCategoryID')
                ->select('a.strIndivID',\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'),'b.*', 'c.*', 'd.*', 'e.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $search_custname)
                ->orderBy('b.strJobOrderID')
                ->get();

        $order = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblCustIndividual AS b', 'a.strJO_CustomerFK', '=', 'b.strIndivID')
                ->leftJoin('tblJOPayment AS c', 'a.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('b.strIndivID',\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'),'a.*', 'c.*')
                ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), '=', $search_custname)
                ->get();
       

        $payment_lists = TransactionJobOrderPayment::all();

        $payments = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustIndividual AS c', 'c.strIndivID', '=', 'a.strJO_CustomerFK')
                ->leftJoin('tblJOSpecific AS d', 'a.strJobOrderID', '=', 'd.strJobOrderFK')
                ->leftJoin('tblSegment AS e', 'd.strJOSegmentFK', '=', 'e.strSegmentID')
                ->leftJoin('tblGarmentCategory as f', 'e.strSegCategoryFK', '=', 'f.strGarmentCategoryID')
                ->select('a.*', 'b.*', 'c.strIndivID', 'd.*', 'e.*', 'f.*')
                ->where('b.strPaymentStatus', 'Pending')
                ->where(\DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'), $search_custname)
                ->orderBy('a.strJobOrderID')
                ->get();


        $empEmail = \Auth::user()->email; //dd($empEmail);
        $emp = \DB::table('tblEmployee')
                ->select('tblEmployee.strEmployeeID')
                ->where('tblEmployee.strEmailAdd', 'LIKE', $empEmail)
                ->get(); //dd($emp);
        $empId;
        for($i = 0; $i < count($emp); $i++){
            $empId = $emp[$i]->strEmployeeID;
        } //dd($empId);

        $empname = \DB::table('tblEmployee')
                    ->select('strEmployeeID', \DB::raw('CONCAT(strEmpFName, " ", strEmpMName, " ", strEmpLName) AS employeename'))
                    ->where('strEmployeeID', '=', $empId)//Temporary, since naka-hardcode pa yung pagset ng employee sa naunang process.
                    ->first(); 

        // dd($payments);


        session(['employee' => $empname]);
        // dd($payments);
        //dd($customer_orders, $payments);

        return view('transaction-billingpayment-individual')
                ->with('search_custname', $search_custname)
                ->with('customer_info', $customer_info)
                ->with('customer_orders', $customer_orders)
                ->with('orders', $order)
                ->with('payments', $payments)
                ->with('payment_lists', $payment_lists)
                ->with('empname', $empname);


    }


    public function savePayment(Request $request)
    {
        $name = session()->get('name');

        //session(['termsOfPayment' => $request->input('termsOfPayment')]);
        //session(['totalPrice' => $request->input('total_price')]);
        session(['amountToPay' => $request->input('amount-payable')]);
        session(['outstandingBal' => (double)$request->input('hidden-outstanding-bal')]);
        session(['amountTendered' => $request->input('amount-tendered')]);
        session(['amountChange' => $request->input('amount-change')]);
        session(['transaction_date' => $request->input('transaction_date')]);
        session(['dueDate' => $request->input('due_date')]);
        $joID = $request->input('joID');

        //dd(session()->get('amountToPay'));
        $custId = \DB::table('tblCustIndividual')
                ->select('strIndivID', \DB::raw('CONCAT(strIndivFName, " ", strIndivMName, " ", strIndivLName) AS fullname'))
                ->where(\DB::raw('CONCAT(strIndivFName, " ", strIndivMName, " ", strIndivLName)'), '=', $name)
                ->get(); //dd($custId);

        for($i = 0; $i < count($custId); $i++){
            $customerID = $custId[$i]->strIndivID;
        }

        $payId = \DB::table('tblJOPayment')
                ->select('strPaymentID', 'strTransactionFK')
                ->where('strTransactionFK', $joID)
                ->where('strPaymentStatus', 'Pending')
                ->get();

        // for($i = 0; $i < count($payId); $i++){
        //     $paymentID = $payId[$i]->strPaymentID;
        // }

        session(['cust_id' => $customerID]);
        session(['jo_ID' => $joID]);

        $modeOfPayment = "Cash";
        $amtTendered = (double)session()->get('amountTendered');
        $amtChange = (double)session()->get('amountChange');
        $orderDate = session()->get('transaction_date'); //tblJobOrder

        $ids = \DB::table('tblJOPayment')
                ->select('strPaymentID')
                ->orderBy('created_at', 'desc')
                ->orderBy('strPaymentID', 'asc')
                ->take(1)
                ->get();
        
            if($ids == null){
                $jobPaymentID = $this->smartCounter("JOPY000"); 
            }else{
                $ID = $ids["0"]->strPaymentID;
                $jobPaymentID = $this->smartCounter($ID);  

            }
        session(['payment_id' => $jobPaymentID]);

        $employee = session()->get('employee');
        $joId = session()->get('jo_ID');
        $dueDate = session()->get('dueDate');
        $amtToPay = (double)session()->get('amountToPay');
        $amtBalance = (double)session()->get('outstandingBal');
        
        if($amtToPay == $amtBalance){

            $balance = (double)$amtToPay - $amtBalance;
            $payTerms = "Paid";
        }
        else{

            $balance = (double)$amtBalance - $amtToPay;
            $payTerms = "Pending";
        }


        //dd($payTerms);
        // $payment = TransactionJobOrderPayment::create(array(
        //         'strPaymentID' => $jobPaymentID,
        //         'strTransactionFK' => $joId,//tblJobOrder
        //         'dblAmountToPay' => $amtToPay, 
        //         'dblOutstandingBal' => $balance,
        //         'dblAmountTendered' => $amtTendered,
        //         'dblAmountChange' => $amtChange,
        //         'strReceivedByEmployeeNameFK' => "EMPL001",
        //         'dtPaymentDate' => $orderDate,
        //         'dtPaymentDueDate' => $dueDate,
        //         'strPaymentStatus' => $payTerms,
        //         'boolIsActive' => 1

        // ));
        // $customers = tblCustIndividual::all();

        // for($i = 0; $i < count($customers); $i++){
        //     $cust = 
        // }

        $updatePayment = \DB::table('tblJOPayment')
                ->where('strTransactionFK', $joID)
                ->update(['strPaymentStatus' => $payTerms], ['dblOutstandingBal' => $balance], ['dtPaymentDueDate' => $dueDate]);
     


        $paymentid = session()->get('payment_id');


        //     dd($balance);
        // //Payment Receipt
        $prId = \DB::table('tblPaymentReceipt')
                ->select('strPaymentReceiptID')
                ->orderBy('created_at', 'desc')
                ->orderBy('strPaymentReceiptID', 'desc')
                ->take(1)
                ->get();

            if($prId == null){
                $payReceiptID = $this->smartCounter("PYR000"); 
            }else{
                $ID = $prId["0"]->strPaymentReceiptID;
                $payReceiptID = $this->smartCounter($ID);  
            }
        
        $paymentReceipt = TransactionPaymentReceipt::create(array(
                'strPaymentReceiptID' => $payReceiptID,
                'strPaymentFK' => session()->get('payment_id'), //tblJobOrder
                'strIssuedByEmpNameFK' => "EMPL001", 
                'boolIsActive' => 1
        ));

        session(['pyrReceiptId' => $payReceiptID]);

        $paymentReceipt->save();


        return view('billingpayment-submit-individual');
    }

    public function printReceipt(Request $request)
    {
        $request->session()->flash('success-message', 'Payment successfully processed!');  
        $this->clearValues();

        return redirect('transaction/payment/individual/home');
    }

    public function generateReceipt()
    {

        $custId = session()->get('cust_id'); //dd($custId);
        $custname = session()->get('name');
        $joId = session()->get('jo_ID');
        
        $amtPaid = session()->get('amountToPay');
        $joBalance = session()->get('outstandingBal');



        $newBalance = (double)$joBalance - $amtPaid;

        $paymentid = session()->get('payment_id');
        $order_receipt = session()->get('jorReceiptId');
        $payment_receipt = session()->get('pyrReceiptId');
        $amtTendered = (double)session()->get('amountTendered');
        $amtChange = (double)session()->get('amountChange');

        $customer_info = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->leftJoin('tblJOPayment AS c', 'b.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'), 'b.*', 'c.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $custname)
                ->first();


        $customer_orders = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->leftJoin('tblJOPayment AS c', 'b.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.strIndivID',\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'),'b.*', 'c.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $custname)
                ->orderBy('b.strJobOrderID')
                ->get();

        // $payments = \DB::table('tblJobOrder AS a')
        //         ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
        //         ->leftJoin('tblCustIndividual AS c', 'c.strIndivID', '=', 'a.strJO_CustomerFK')
        //         ->select('a.*', 'b.*', 'c.strIndivID')
        //         ->where('b.strPaymentID', $paymentid)
        //         ->get();
         // dd($customer_orders);

        $empname = \DB::table('tblEmployee')
                    ->select('strEmployeeID', \DB::raw('CONCAT(strEmpFName, " ", strEmpMName, " ", strEmpLName) AS employeename'))
                    ->where('strEmployeeID', '=', 'EMPL001')//Temporary, since naka-hardcode pa yung pagset ng employee sa naunang process.
                    ->first();

        $pdf = PDF::loadView('pdf/billpayment-individual-receipt', 
                     compact('paymentid', 'order_receipt', 'payment_receipt', 'custId',
                        'amtTendered', 'amtChange','empname', 'custname', 'payments', 'customer_orders', 'customer_info', 'joId', 'newBalance'))
        ->setPaper('Letter')->setOrientation('portrait');

        return $pdf->stream();

    }

    public function clearValues()
    {
        session()->forget('jo_ID');
        session()->forget('cust_id');
        session()->forget('amountToPay');
        session()->forget('amountTendered');
        session()->forget('amountChange');
        session()->forget('outstandingBal');
        session()->forget('transaction_date');
        session()->forget('dueDate');
        session()->forget('jorReceiptId');
        session()->forget('pyrReceiptId');
        session()->forget('payment_id');
        session()->forget('search_custname');
        session()->forget('name');
        session()->forget('employee');


    }
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

    public function smartCounter($id)
    {   

        $lastID = str_split($id);

        $ctr = 0;
        $tempID = "";
        $tempNew = [];
        $newID = "";
        $add = TRUE;

        for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

            $tempID = $lastID[$ctr];

            if($add){
                if(is_numeric($tempID) || $tempID == '0'){
                    if($tempID == '9'){
                        $tempID = '0';
                        $tempNew[$ctr] = $tempID;

                    }else{
                        $tempID = $tempID + 1;
                        $tempNew[$ctr] = $tempID;
                        $add = FALSE;
                    }
                }else{
                    $tempNew[$ctr] = $tempID;
                }           
            }
            $tempNew[$ctr] = $tempID;   
        }

        
        for($ctr = 0; $ctr < count($lastID); $ctr++){
            $newID = $newID . $tempNew[$ctr];
        }

        return $newID;
    }
}
