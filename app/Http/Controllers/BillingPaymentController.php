<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use Session;
use DB;

use App\Individual;

use App\TransactionJobOrder;
use App\TransactionJobOrderPayment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillingPaymentController extends Controller
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

    
    public function index()
    {
        $types = "";
        return view('transaction-billingpayment')
                ->with('types', $types);
    }

    public function searchCustomer(Request $request)
    {
        $customer = $request->input('cust_name');
        $types = $request->input('cust_type');

        
        // var_dump($customer, $types, $cust_info);
        // dd("");
        

        return view('transaction-billingpayment')
                ->with('customer', $customer)
                ->with('types', $types);
                // ->with('pending_payments', $pending_payments);
                //->with('or_summary', $or_summary);
    }

    public function generateBill()
    {


        $pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        $pdf = PDF::loadView('/pdf/pendingPaymentPDF');

        return $pdf->stream();

    }

    public function generateReceipt()
    {


        $pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        $pdf = PDF::loadView('/pdf/paymentReceiptPDF');

        return $pdf->stream();

    }

    public function billCustomer(Request $request)
    {

       // $customers = \DB::table('tblJobOrder AS a')
       //              ->leftJoin('tblCustIndividual AS b', 'a.strJO_CustomerFK', '=', 'b.strIndivID')
       //              ->select('a.*', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'))
       //              ->where('a.strJobOrderID', $joID)
       //              ->get();
        //dd($customers);

        return view('transaction-billingpayment-billcustomer');
                // ->with('joID', $joID)
                // ->with('values', $values)
                // ->with('customers', $customers);
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
