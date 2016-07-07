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
use App\TransactionAlteration;



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
        //  $segment = GarmentSegment::all();

        //  $alteration = Alteration::all();
         
        //  $alterationtransac = \DB::table('tblAlterationTransaction AS a')
        //             ->leftJoin('tblAlteration AS b', 'a.strAltTransacAltTypeFK', '=', 'b.strAlterationID')
        //             ->select('a.*', 'b.strAlterationName') 
        //             ->orderBy('a.strAltTransacID')
        //             ->get();

        return view('alteration.walkin-transaction');
                    // ->with('segment', $segment)
                    // ->with('alteration', $alteration)
                    // ->with('alterationtransac', $alterationtransac);
    }

    public function newcust()
    {  
         $segment = GarmentSegment::all();

         $alteration = Alteration::all();
         
         $alterationtransac = \DB::table('tblAlterationTransaction AS a')
                    ->leftJoin('tblAlteration AS b', 'a.strAltTransacAltTypeFK', '=', 'b.strAlterationID')
                    ->leftJoin('tblSegment AS c', 'a.strAltTransacSegFK', '=', 'c.strSegmentID')
                    ->select('a.*', 'b.strAlterationName', 'c.strSegmentName') 
                    ->orderBy('a.strAltTransacID')
                    ->get();

        // $alterationtrans = \DB::table('tblAlteration')
        //             ->join('tblSegment', 'tblAlteration.strAlterationSegmentFK', '=', 'tblSegment.strSegmentID')
        //             ->select('tblAlteration.*','tblSegment.strSegmentName') 
        //             ->orderBy('strAlterationID')
        //             ->get();


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
        $alterationtransacs = TransactionAlteration::get();
    
            $alterationtransacs = TransactionAlteration::create(array(
                'strAltTransacSegFK' => $request->input('strAltTransacSegFK'),
                'strAltTransacAltTypeFK' => $request->input('strAltTransacAltTypeFK'),
                'txtAltTransacDesc' => trim($request->input('txtAltTransacDesc'))
                ));

        $alteration = Alteration::all();
        $segment = GarmentSegment::all();

        $added=$alterationtransacs->save();


        // session(['alt-segment' => $alterationtransacs]);

        return redirect('alteration-walkin-newcustomer');
       
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
