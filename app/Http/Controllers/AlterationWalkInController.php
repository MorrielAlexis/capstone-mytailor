<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\GarmentCategory;
use App\SegmentPattern;
use App\GarmentSegment; 
use App\Alteration; 



class AlterationWalkInController extends Controller
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
         $segment = GarmentSegment::all();

         $alteration = Alteration::all();
         
         $alterationtransac = \DB::table('tblAlterationTransaction AS a')
                    ->leftJoin('tblAlteration AS b', 'a.strAltTransacAltTypeFK', '=', 'b.strAlterationID')
                    ->select('a.*', 'b.strAlterationName') 
                    ->orderBy('a.strAltTransacID')
                    ->get();

        return view('alteration.walkin-transaction')
                    ->with('segment', $segment)
                    ->with('alteration', $alteration)
                    ->with('alterationtransac', $alterationtransac);
    }

    public function newcust()
    {  
         $segment = GarmentSegment::all();

         $alteration = Alteration::all();
         
         $alterationtransac = \DB::table('tblAlterationTransaction AS a')
                    ->leftJoin('tblAlteration AS b', 'a.strAltTransacAltTypeFK', '=', 'b.strAlterationID')
                    ->select('a.*', 'b.strAlterationName') 
                    ->orderBy('a.strAltTransacID')
                    ->get();

        return view('alteration.walkin-newcustomer')
                    ->with('segment', $segment)
                    ->with('alteration', $alteration)
                    ->with('alterationtransac', $alterationtransac);
     
    }

    public function oldcust()
    {
        return view('alteration.walkin-oldcustomer');
    }

    public function info()
    {
        return view('alteration.checkout-info');
    }

    public function pay()
    {
        return view('alteration.checkout-payment');
    }

    public function measuredetails()
    {
        return view('alteration.checkout-measurement');
    }


    public function saveOrder(Request $request)
    {
            // $data_garment = $request->input('');
            $data_segment = $request->input('selectedSegment');
            $data_alterationtype = $request->input('selectedType');
            $values = [];

            $alterations = \DB::table('tblAlteration AS a')
                    ->leftJoin('tblSegment AS b', 'a.strAlterationSegmentFK', '=', 'b.strSegmentID',  'tblGarmentCategory as c','c. str')
                    ->select('a.*', 'b.strSegmentName') 
                    ->whereIn('a.strAlterationID', $data_alterationtype)
                    ->whereIn('b.strSegmentID', $data_segment)
                    ->orderBy('a.strAlterationID')
                    ->get();

            
        session(['segment_data' => $data_segment]);
        session(['segment_values' => $values]);
    }



    // public function newTrans()
    // {
    //     return view('transaction-alterationwalkIn-newtransaction');
    // }

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
