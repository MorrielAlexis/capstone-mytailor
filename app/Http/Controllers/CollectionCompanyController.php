<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectionCompanyController extends Controller
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
        $companies = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustCompany AS c', 'c.strCompanyID', '=', 'a.strJO_CustomerCompanyFK')
                ->select('a.*', 'b.*', 'c.strCompanyID', 'c.strCompanyName')
                ->orderBy('b.strPaymentID')
                ->get();

        $comp = \DB::table('tblCustCompany AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strCompanyID', '=', 'b.strJO_CustomerCompanyFK')
                ->select('a.strCompanyID', 'a.strCompanyName','b.*')
                ->orderBy('b.strJobOrderID')
                ->get();

        return view('transaction-billingcollection-company')
                ->with('companies', $companies)
                ->with('comp', $comp);
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
