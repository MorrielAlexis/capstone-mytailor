<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\TransactionJobOrderPayment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillingCollectionController extends Controller
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

        // $customers = \DB::table('tblCustIndividual AS a')
        //             ->select(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'))
        //             ->get();
        

        $payments = \DB::table('tblJOPayment AS a')
                    ->leftJoin('tblJobOrder AS b', 'a.strTransactionFK', '=', 'b.strJobOrderID')
                    ->leftJoin('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
                    ->select('a.*', 'b.*', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName) AS fullname'))
                    ->get();

        // dd($payments);

        return view('transaction-billingcollection')
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
