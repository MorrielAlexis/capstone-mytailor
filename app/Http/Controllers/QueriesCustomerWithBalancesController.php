<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QueriesCustomerWithBalancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         $results = \DB::table('tblJOPayment AS a')
                    ->join('tblJobOrder as b','a.strTransactionFK',  '=' , 'b.strJobOrderID')
                    ->join('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
                    ->select(\DB::raw('CONCAT(c.strIndivFName, " " , c.strIndivMName, " " , c.strIndivLName) as custName'),'a.dblOutstandingBal as balance', 'a.dtPaymentDueDate as dueDate')
                    ->orderBy('strIndivID', 'desc')
                    ->get();
        

        return view('queries.queries-customers-with-balances')
              ->with('results', $results);
    }

    public function company()
    {       
         $companyBal = \DB::table('tblJOPayment AS a')
                    ->join('tblJobOrder as b','a.strTransactionFK',  '=' , 'b.strJobOrderID')
                    ->join('tblCustCompany AS c', 'b.strJO_CustomerCompanyFK', '=', 'c.strCompanyID')
                    ->select('c.strCompanyName as name','a.dblOutstandingBal as balance', 'a.dtPaymentDueDate as dueDate')
                    ->orderBy('strCompanyID', 'desc')
                    ->get();
        

        return view('queries.queries-companies-with-balances')
              ->with('companyBal', $companyBal);
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
