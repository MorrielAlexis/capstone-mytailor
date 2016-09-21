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
                    // ->where('c.strIndivID', '=' , 'b.strJO_CustomerFK')
                    ->orderBy('strIndivID', 'desc')
                    // ->take(1)
                    ->get();

                    // dd($results);

        // $topCustomers = \DB::select('SELECT Concat(tblCustIndividual.strIndivFName, " " , tblCustIndividual.strIndivMName, " " , tblCustIndividual.strIndivLName)as name, COUNT(strIndivID) as ctr FROM tblJobOrder,tblCustIndividual WHERE tblCustIndividual.strIndivID = tblJobOrder.strJO_CustomerFK GROUP BY strIndivID ORDER BY ctr DESC limit 3');
        

        return view('queries.queries-customers-with-balances')
              ->with('results', $results);
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
