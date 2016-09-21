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
        //  $results = \DB::table('tblNonShopAlteration AS a')
        //             ->join('tblCustIndividual AS b', 'a.strCustIndFK', '=', 'b.strIndivID')
        //             ->join('tblNonShopAlterSpecific as c','a.strNonShopAlterID',  '=' , 'c.strNonShopAlterFK')
        //             ->join('tblSegment as d', 'c.strGarmentSegmentFK', '=' , 'd.strSegmentID')
        //             ->join('tblAlteration as e', 'c.strAlterationTypeFK', '=' , 'e.strAlterationID')
        //             ->select(\DB::raw('CONCAT(b.strIndivFName, " " , b.strIndivMName, " " , b.strIndivLName) as custName'),\DB::raw('CONCAT(b.strIndivHouseNo, " ", b.strIndivStreet, " ", b.strIndivBarangay, " ", b.strIndivCity, " ", b.strIndivProvince, " ", b.strIndivZipCode) as address'), 'a.strNonShopAlterID as transID', 'a.dblOrderTotalPrice AS totalPrice', 'b.strIndivEmailAddress AS custEmail', 'b.strIndivCPNumber AS cpNo', 'd.strSegmentName as segment', 'e.strAlterationName as alteration')
        //             ->where('b.strIndivID', $request->input('customerID'))
        //             ->get();

        // $topCustomers = \DB::select('SELECT Concat(tblCustIndividual.strIndivFName, " " , tblCustIndividual.strIndivMName, " " , tblCustIndividual.strIndivLName)as name, COUNT(strIndivID) as ctr FROM tblJobOrder,tblCustIndividual WHERE tblCustIndividual.strIndivID = tblJobOrder.strJO_CustomerFK GROUP BY strIndivID ORDER BY ctr DESC limit 3');
        

        return view('queries.queries-customers-with-balances');
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
