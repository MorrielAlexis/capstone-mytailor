<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use PDF;

use App\Individual;
use App\TransactionJobOrder;
use App\TransactionJobOrderPayment;
use App\TransactionPaymentReceipt;

use App\Employee;

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
                ->select('a.strIndivID',\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'),'b.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $search_custname)
                ->orderBy('b.strJobOrderID')
                ->get();

        $payments = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustIndividual AS c', 'c.strIndivID', '=', 'a.strJO_CustomerFK')
                ->leftJoin('tblJOSpecific AS d', 'a.strJobOrderID', '=', 'd.strJobOrderFK')
                ->leftJoin('tblSegment AS e', 'd.strJOSegmentFK', '=', 'e.strSegmentID')
                ->select('a.*', 'b.*', 'c.strIndivID', 'd.*', 'e.*')
                ->orderBy('a.strJobOrderID')
                ->get();
        //dd($payments);
        // dd($customer_info, $customer_orders, $payments);

        return view('transaction-billingpayment-individual')
                ->with('search_custname', $search_custname)
                ->with('customer_info', $customer_info)
                ->with('customer_orders', $customer_orders)
                ->with('payments', $payments);
    }


    public function savePayment(Request $request)
    {
        $name = session()->get('name');

        //session(['termsOfPayment' => $request->input('termsOfPayment')]);
        //session(['totalPrice' => $request->input('total_price')]);
        session(['amountToPay' => $request->input('amt-to-pay')]);
        session(['outstandingBal' => $request->input('outstanding-bal')]);
        session(['amountTendered' => $request->input('amount-tendered')]);
        session(['amountChange' => $request->input('amount-change')]);
        session(['transaction_date' => $request->input('transaction_date')]);
        session(['dueDate' => $request->input('due_date')]);

        //dd(session()->get('amountToPay'));
        $custId = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->leftJoin('tblJOPayment AS c', 'b.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'), 'b.*', 'c.*')
                ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), '=', $name)
                ->get();

            

        for($i = 0; $i < count($custId); $i++){
            $customerID = $custId[$i]->strIndivID;
        }

        for($i = 0; $i < count($custId); $i++){
            
                $joID = $custId[$i]->strJobOrderID;
        
        }

        session(['cust_id' => $customerID]);
        session(['jo_ID' => $joID]);

        $modeOfPayment = "Cash";
        $amtTendered = (double)session()->get('amountTendered');
        $amtChange = (double)session()->get('amountChange');
        $orderDate = session()->get('transaction_date'); //tblJobOrder

        $ids = \DB::table('tblJOPayment')
                ->select('strPaymentID')
                ->orderBy('created_at', 'asc')
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

        $payment = TransactionJobOrderPayment::create(array(
                'strPaymentID' => $jobPaymentID,
                'strTransactionFK' => session()->get('jo_ID'),//tblJobOrder
                'dblAmountToPay' => session()->get('amountToPay'), 
                'dblOutstandingBal' => 0.00,
                'dblAmountTendered' => $amtTendered,
                'dblAmountChange' => $amtChange,
                'strReceivedByEmployeeNameFK' => 'EMPL001' ,
                'dtPaymentDate' => 2013-08-21,
                'dtPaymentDueDate' => 2013-08-22,
                'strPaymentStatus' => 'Paid',
                'boolIsActive' => 1

        ));
        $payment->save();


        return redirect('transaction/payment/individual/home');
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
