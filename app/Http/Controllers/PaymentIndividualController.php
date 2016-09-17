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

    public function index()
    {

        return view('transaction-billingpayment-individual');
    }

    public function custInfo(Request $request)
    {
        $search_custname = $request->input('cust_name');

        // $customer = \DB::table('tblCustIndividual AS a')
        //         ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", strIndivMName, " ", strIndivLName) AS fullname'))
        //         ->where(\DB::raw('CONCAT(a.strIndivFName, " ", strIndivMName, " ", strIndivLName)'), '=', $search_custname)
        //         ->first();

        $customer_info = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblCustIndividual AS b', 'a.strJO_CustomerFK', '=', 'b.strIndivID')
                ->leftJoin('tblJOPayment AS c', 'a.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.*', 'b.strIndivID', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'), 'c.*')
                ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), '=', $search_custname)
                ->first();

        // session(['customer' => 'customer_info']);
        // var_dump($customer_info);
        // dd("");
        // dd($search_custname, $customer_info);

        return view('transaction-billingpayment-individual')
                ->with('search_custname', $search_custname)
                ->with('customer_info', $customer_info);
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
}
