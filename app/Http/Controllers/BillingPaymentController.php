<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use App\Payment;
use App\TransactionJobOrder;
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

    public function search(Request $request)
    {
        $search_query = $request->input('search_query');
        $types = $request->input('customer_type');

        /*$customers = \DB::table('tblPayment AS a')
                    ->leftJoin('tblCustIndividual AS b', 'a.strCustomerIdFK', '=', 'b.strIndivID')
                    ->select('a.*', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'))
                    ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), $search_query)
                    ->get();
        /*
        $payments = \DB::table('tblPayment AS a')
                    ->leftJoin('tblCustIndividual AS b', 'a.strCustomerIdFK', '=', 'b.strIndivID')
                    ->select('a.*', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'))
                    ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), $search_query)
                    ->get();
        */

        $customers = \DB::table('tblCustIndividual AS a')
                    ->select(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'))
                    ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), $search_query)
                    ->get();
        

        $pending_payments = \DB::table('tblJOPayment AS a')
                    ->leftJoin('tblJobOrder AS b', 'a.strTransactionFK', '=', 'b.strJobOrderID')
                    ->leftJoin('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
                    ->select('a.*', 'b.*', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'))
                    ->where(\DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'), $search_query)
                    ->where('a.strPaymentStatus', 'Pending')
                    ->get();
        //dd($pending_payments);

        $or_summary = \DB::table('tblJobOrder AS a')
                    ->leftJoin('tblJOSpecific AS b', 'b.strJobOrderFK', '=', 'a.strJobOrderID')
                    ->select('a.*', 'b.*')
                    ->where('b.strJobOrderFK', 'a.strJobOrderID')
                    ->get();

        /*$order_summary = \DB::table('tblJOSpecific AS a')
                    ->leftJoin('tblJobOrder AS b', 'a.strJobOrderFK', '=', 'b.strJobOrderID')
                    ->leftJoin('tblSegment AS c', 'a.strJOSegmentFK', '=', 'c.strSegmentID')
                    ->leftJoin('tblGarmentCategory AS d', 'c.strSegCategoryFK', '=', 'd.strGarmentCategoryID')
                    ->select('a.*', 'b.*', 'c.*', 'd.strGarmentCategoryName')
                    ->where('a.strJOSpecificID', 'b.strJobOrderID')
                    ->get();*/
        

        return view('transaction-billingpayment')
                ->with('customers', $customers)
                ->with('types', $types)
                ->with('pending_payments', $pending_payments)
                ->with('or_summary', $or_summary);
                //->with('payments', $payments);
    }



    public function billCustomer(Request $request)
    {
        $search_query = $request->input('search_query');

        $customers = \DB::table('tblCustIndividual AS a')
                    ->select(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'))
                    ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), $search_query)
                    ->get();

        $transac_dates = \DB::table('tblJOPayment AS a')
                    ->leftJoin('tblJobOrder AS b', 'a.strTransactionFK', '=', 'b.strJobOrderID')
                    ->leftJoin('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
                    ->select('a.*', 'b.*', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'))
                    ->where(\DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'), $search_query)
                    ->where('a.strPaymentStatus', 'Pending')
                    ->get();

        return view('transaction-billingpayment-billcustomer')
                ->with('transac_dates', $transac_dates);
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
