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
use App\Individual;

use App\TransactionJOAlteration;
use App\TransactionNonShopAlteration;
use App\TransactionNonShopAlterationSpecifics;


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
        $totalDays = 0;
        $totalPrice = 0.00;

        session(['orders' => $values]);

        return view('alteration.walkin-newcustomer')
                ->with('segments', $segment)
                ->with('alte_types', $alteration)
                ->with('alterations', session()->get('orders'))
                ->with('total_days', $totalDays)
                ->with('total_price', $totalPrice);
    }

    public function addValues(Request $request)
    {
        $segment = $request->input('alte-segment');
        $alteType = $request->input('alte-type');
        $alteDesc = $request->input('alte-desc');
        
        $data_segment = \DB::table('tblSegment')
                    ->select('strSegmentName')
                    ->where('strSegmentID', $segment)
                    ->pluck('segment');

        $data_alteType = \DB::table('tblAlteration')
                    ->select('strAlterationName')
                    ->where('strAlterationID', $alteType)
                    ->pluck('alteration');

        $alte_price = \DB::table('tblAlteration')
                    ->select('dblAlterationPrice')
                    ->where('strAlterationID', $alteType)
                    ->pluck('alteration_price');

        $alte_days = \DB::table('tblAlteration')
                    ->select('intAlterationMinDays')
                    ->where('strAlterationID', $alteType)
                    ->pluck('alteration_days');

        $values;

        for($i = 0; $i < count($data_segment); $i++){
            $values[$i][0] = $segment;
            $values[$i][1] = $alteType;
            $values[$i][2] = $data_segment;
            $values[$i][3] = $data_alteType;
            $values[$i][4] = $alteDesc;
            $values[$i][5] = $alte_price;
            $values[$i][6] = $alte_days;
        }

        $request->session()->push('orders', $values[0]);

        return redirect('transaction/alteration-walkin-newcustomer-update');
    }

    public function updateCart()
    {
        $segment = GarmentSegment::all();
        $alteration = Alteration::all();

        $values = session()->get('orders');
        $totalPrice = 0.00;
        $totalDays = 0;

        for($i = 0; $i < count($values); $i++){
            $totalPrice += $values[$i][5];
            $totalDays  += $values[$i][6];
        }

        return view('alteration.walkin-newcustomer')
                ->with('segments', $segment)
                ->with('alte_types', $alteration)
                ->with('alterations', $values)
                ->with('total_price', $totalPrice)
                ->with('total_days', $totalDays);
            
    }

    public function deleteOrder(Request $request)
    {
        $to_be_deleted = ((int)$request->input('delete-item-id'));
        $values = session()->get('orders');

        unset($values[$to_be_deleted]);
        $values = array_slice($values, 0);

        session()->forget('orders');
        session(['orders' => $values]);

        return redirect('transaction/alteration-walkin-newcustomer-update');
    }

    public function checkoutCustInfo()
    {   
        $ids = \DB::table('tblNonShopAlteration')
            ->select('strNonShopAlterID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strNonShopAlterID', 'desc')
            ->take(1)
            ->get();

        if($ids == null){
            $altID = $this->smartCounter("ALTN000"); 
        }else{
            $ID = $ids["0"]->strNonShopAlterID;
            $altID = $this->smartCounter($ID);  
        }

        //get all the individuals
        $ids = \DB::table('tblCustIndividual')
            ->select('strIndivID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strIndivID', 'desc')
            ->take(1)
            ->get();

        if($ids == null){
            $custID = $this->smartCounter("CUSTP000"); 
        }else{
            $ID = $ids["0"]->strIndivID;
            $custID = $this->smartCounter($ID);  
        }

        session(['alteration_id' => $altID]);
        session(['customer_id' => $custID]);    

        return view('alteration.checkout-info')
                ->with('custID', $custID)
                ->with('newID', $altID);
    }

    public function addNewCustomer(Request $request)
    {           
        $individual = Individual::create(array(
                    'strIndivID' => $request->input('addIndiID'),
                    'strIndivFName' => trim($request->input('first_name')),     
                    'strIndivMName' => trim($request->input('middle_name')),
                    'strIndivLName' => trim($request->input('last_name')),
                    'strIndivSex' => $request->input('cust-sex'),
                    'strIndivHouseNo' => trim($request->input('addCustPrivHouseNo')), 
                    'strIndivStreet' => trim($request->input('addCustPrivStreet')),
                    'strIndivBarangay' => trim($request->input('addCustPrivBarangay')),   
                    'strIndivCity' => trim($request->input('addCustPrivCity')),   
                    'strIndivProvince' => trim($request->input('addCustPrivProvince')),
                    'strIndivZipCode' => trim($request->input('addCustPrivZipCode')),
                    'strIndivLandlineNumber' => trim($request->input('addPhone')),
                    'strIndivCPNumber' => trim($request->input('addCel')), 
                    'strIndivCPNumberAlt' => trim($request->input('addCelAlt')),
                    'strIndivEmailAddress' => trim($request->input('addEmail')),
                    'boolIsActive' => 1
                    ));

            $individual->save();

        return redirect('transaction/alteration-checkout-payment');
    }

    public function saveTransaction(Request $request)
    {   
        $values = session()->get('orders');
        $totalPrice = (double)$request->input('total-price');
        $transaction_date = $request->input('transaction_date');

        $alteration = TransactionNonShopAlteration::create(array(
            'strNonShopAlterID' => $request->input('alteID'),
            'strCustIndFK' => session()->get('customer_id'),
            'dblOrderTotalPrice' => $totalPrice,
            'dtAlteDate' => $transaction_date
        ));

        $alteration->save();

        for($i = 0; $i < count($values); $i++){
            $ids = \DB::table('tblNonShopAlterSpecific')
                ->select('strNonAlterSpecificID') //palitan pls
                ->orderBy('created_at', 'desc')
                ->orderBy('strNonAlterSpecificID', 'desc')
                ->take(1)
                ->get();

            if($ids == null){
                $alteSpecsID = $this->smartCounter("ALTSPEC000"); 
            }else{
                $ID = $ids["0"]->strNonAlterSpecificID;
                $alteSpecsID = $this->smartCounter($ID);  
            }

            $ids = \DB::table('tblJOAlteration')
                ->select('strJOAlterationID') //palitan pls
                ->orderBy('created_at', 'desc')
                ->orderBy('strJOAlterationID', 'desc')
                ->take(1)
                ->get();

            if($ids == null){
                $joAlteID = $this->smartCounter("JOALTE000"); 
            }else{
                $ID = $ids["0"]->strJOAlterationID;
                $joAlteID = $this->smartCounter($ID);  
            }

            $alterationSpecs = TransactionNonShopAlterationSpecifics::create(array(
                'strNonAlterSpecificID' => $alteSpecsID,
                'strNonShopAlterFK' => $request->input('alteID'),
                'strGarmentSegmentFK' => $values[$i][0],
                'strAlterationTypeFK' => $values[$i][1]
            ));

            $alterationSpecs->save();

            $jobOrderAlteration = TransactionJOAlteration::create(array(
                'strJOAlterationID' => $joAlteID,
                'strAlterationType' => "Non shop",
                'strAlterationFK' => $values[$i][1],
                'txtAlterationNotes' => $values[$i][4] ,
                'strSegmentNonShopSpecFK' => $alteSpecsID
            ));

            $jobOrderAlteration->save();
        }//end of jo alteration and specs loop

        session()->forget('orders');
        session()->forget('alteration_id');

        \Session::flash('flash_message','Alteration successfully created.Order is not being processed.'); //flash message

        return redirect('transaction/alteration-walkin-newcustomer');
    }

    public function cancelOrder(Request $request)
    {
        session()->forget('orders');
        session()->forget('alteration_id');

        return redirect('transaction/alteration-walkin-newcustomer');
    }

    public function checkoutPayment()   
    {   
        $values = session()->get('orders');
        $alte_id = session()->get('alteration_id');

        $totalPrice = 0.00;
        $totalDays = 0;

        for($i = 0; $i < count($values); $i++){
            $totalPrice += $values[$i][5];
            $totalDays  += $values[$i][6];
        }

        return view('alteration.checkout-payment')
                ->with('alterations', $values)
                ->with('alte_id', $alte_id)
                ->with('total_price', $totalPrice)
                ->with('total_days', $totalDays);
    }

    public function oldcust()
    {
        return view('alteration.walkin-oldcustomer');
    }

    public function checkoutAddMeasurement()
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
