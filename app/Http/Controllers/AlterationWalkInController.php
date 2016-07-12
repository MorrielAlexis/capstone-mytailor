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
       
        return view('alteration.walkin-transaction');
             
    }

    public function newCust()
    {
        return view('alteration.walkin-newcustomer');
    }

    public function showCart()
    {       
        $segment = GarmentSegment::all();
        $alteration = Alteration::all();

        $values = [];
    
        session(['orders' => $values]);

        return view('alteration.walkin-newcustomer')
                ->with('segments', $segment)
                ->with('alte_types', $alteration)
                ->with('alterations', session()->get('orders'));
    }

    public function addOrder(Request $request)
    {
        $data_segment = $request->input('alte-segment');
        $data_alteType = $request->input('alte-type');
        $data_alteDesc = $request->input('alte-desc');

        $values;

        for($i = 0; $i < count($data_segment); $i++){
            $values[$i][0] = $data_segment;
            $values[$i][1] = $data_alteType;
            $values[$i][2] = $data_alteDesc;
        }

        $request->session()->push('orders', $values[0]);
        var_dump(session()->get('orders'));
        $segment = GarmentSegment::all();
        $alteration = Alteration::all();

        return view('alteration.walkin-newcustomer')
                ->with('segments', $segment)
                ->with('alte_types', $alteration)
                ->with('alterations', session()->get('orders'));
            
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

    public function smartCounter($id)
    {   

        $lastID = str_split($id);

        $ctr = 0;
        $tempID = "";
        $tempNew = [];
        $newID = "";
        $add = TRUE;

        for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

            $tempID = $lastID[$ctr];

            if($add){
                if(is_numeric($tempID) || $tempID == '0'){
                    if($tempID == '9'){
                        $tempID = '0';
                        $tempNew[$ctr] = $tempID;

                    }else{
                        $tempID = $tempID + 1;
                        $tempNew[$ctr] = $tempID;
                        $add = FALSE;
                    }
                }else{
                    $tempNew[$ctr] = $tempID;
                }           
            }
            $tempNew[$ctr] = $tempID;   
        }

        
        for($ctr = 0; $ctr < count($lastID); $ctr++){
            $newID = $newID . $tempNew[$ctr];
        }

        return $newID;
    }
}
