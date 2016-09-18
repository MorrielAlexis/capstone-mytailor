<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use PDF;

use App\Company;
use App\TransactionJobOrder;
use App\TransactionJobOrderPayment;
use App\TransactionPaymentReceipt;

use App\Employee;

class PaymentCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_custname = $request->input('cust_name');
        session(['search_name' => $search_custname]);


        return view('transaction-billingpayment-company-home')
            ->with('search_name', $search_custname);
    }

    public function companyInfo(Request $request)
    {

        $search_custname = $request->input('cust_name');

        $customer_info = \DB::table('tblCustCompany AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strCompanyID', '=', 'b.strJO_CustomerCompanyFK')
                ->leftJoin('tblJOPayment AS c', 'b.strJobOrderID', '=', 'c.strTransactionFK')
                ->select('a.strCompanyID', 'a.strCompanyName', 'b.*', 'c.*')
                ->where('a.strCompanyName', '=', $search_custname)
                ->first();

        $customer_orders = \DB::table('tblCustCompany AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strCompanyID', '=', 'b.strJO_CustomerCompanyFK')
                ->select('a.strCompanyID', 'a.strCompanyName','b.*')
                ->where('a.strCompanyName', '=', $search_custname)
                ->orderBy('b.strJobOrderID')
                ->get();

        $payments = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustCompany AS c', 'c.strCompanyID', '=', 'a.strJO_CustomerCompanyFK')
                ->select('a.*', 'b.*', 'c.strCompanyID')
                ->orderBy('a.strJobOrderID')
                ->get();


        //dd($customer_info);


        return view('transaction-billingpayment-company')
                ->with('search_custname', $search_custname)
                ->with('customer_info', $customer_info)
                ->with('customer_orders', $customer_orders)
                ->with('payments', $payments);
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
