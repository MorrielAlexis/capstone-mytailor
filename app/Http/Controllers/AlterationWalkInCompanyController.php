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
use App\Company;

use App\TransactionJOAlteration;
use App\TransactionNonShopAlteration;
use App\TransactionNonShopAlterationSpecifics;


class AlterationWalkInCompanyController extends Controller
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
        return view('alteration-company.walkin-transaction');      
    }

    public function newCust()
    {
        return view('alteration-company.alteration-comp-walkin-newcustomer');
    }

    public function showCart()
    {       
        $segment = GarmentSegment::all();
        $alteration = Alteration::all();

        $values = [];
        $totalDays = 0;
        $totalPrice = 0.00;

        session(['orders' => $values]);

        return view('alteration-company.alteration-comp-walkin-newcustomer')
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

        return view('alteration-company.alteration-comp-walkin-newcustomer')
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
        $ids = \DB::table('tblCustCompany')
            ->select('strCompanyID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strCompanyID', 'desc')
            ->take(1)
            ->get();

        if($ids == null){
            $custID = $this->smartCounter("CUSTC000"); 
        }else{
            $ID = $ids["0"]->strCompanyID;
            $custID = $this->smartCounter($ID);  
        }

        session(['alteration_id' => $altID]);
        session(['customer_id' => $custID]);    

        return view('alteration-company.alteration-comp-checkout-info')
                ->with('custID', $custID)
                ->with('newID', $altID);
    }

    public function addNewCustomer(Request $request)
    {           
        $company = Company::create(array(
                    'strCompanyID' => $request->input('addCompID'),
                    'strCompanyName' => trim($request->input('company_name')),     
                    'strContactPerson' => trim($request->input('contact_person')),
                    'strCompanyBuildingNo' => trim($request->input('addComBldgNo')), 
                    'strCompanyStreet' => trim($request->input('addComStreet')),
                    'strCompanyBarangay' => trim($request->input('addComBarangay')),   
                    'strCompanyCity' => trim($request->input('addComCity')),   
                    'strCompanyProvince' => trim($request->input('addComProvince')),
                    'strCompanyZipCode' => trim($request->input('addComZipCode')),
                    'strCompanyTelNumber' => trim($request->input('addPhone')),
                    'strCompanyCPNumber' => trim($request->input('addCel')), 
                    'strCompanyCPNumberAlt' => trim($request->input('addCelAlt')),
                    'strCompanyEmailAddress' => trim($request->input('addEmail')),
                    'boolIsActive' => 1
                    ));

            $company->save();

        return redirect('transaction/alteration-checkout-payment');
    }

    public function saveTransaction(Request $request)
    {   
        $values = session()->get('orders');
        $totalPrice = (double)$request->input('total-price');
        $transaction_date = $request->input('transaction_date');

        $alteration = TransactionNonShopAlteration::create(array(
            'strNonShopAlterID' => $request->input('alteID'),
            'strCustCompFK' => session()->get('customer_id'),
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

        return view('alteration-company.alteration-comp-checkout-payment')
                ->with('alterations', $values)
                ->with('alte_id', $alte_id)
                ->with('total_price', $totalPrice)
                ->with('total_days', $totalDays);
    }

    public function oldcust()
    {
        return view('alteration-company.walkin-oldcustomer');
    }

    public function checkoutAddMeasurement()
    {
        return view('alteration-company.checkout-measurement');
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
