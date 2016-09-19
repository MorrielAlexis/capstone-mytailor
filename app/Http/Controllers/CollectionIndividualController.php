<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectionIndividualController extends Controller
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
        $customers  = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustIndividual AS c', 'c.strIndivID', '=', 'a.strJO_CustomerFK')
                ->select('a.*', 'b.*', 'c.strIndivID', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName) AS fullname'))
                ->orderBy('a.strJobOrderID')
                ->get();

        $cust = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'), 'b.*')
                ->orderBy('b.strJobOrderID')
                ->get();

        return view('transaction-billingcollection-individual')
            ->with('customers', $customers)
            ->with('cust', $cust);
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
