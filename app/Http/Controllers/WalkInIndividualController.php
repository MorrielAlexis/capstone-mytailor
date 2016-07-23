<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\GarmentCategory;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\Individual;

use App\Segment;
use App\SegmentPattern;
use App\SegmentStyle;

use App\MeasurementCategory;
use App\MeasurementDetail;
use App\StandardSizeCategory;

use App\TransactionJobOrder;
use App\TransactionJobOrderSpecifics;
use App\TransactionJobOrderSpecificsPattern;
use App\TransactionJobOrderMeasurementProfile;
use App\TransactionJobOrderMeasurementSpecifics;

class WalkInIndividualController extends Controller
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
        if(session()->get('segment_values') != null){
            $values = session()->get('segment_values');
        }else{
            $values = [];
            session(['segment_values' => $values]);
        }

        $categories = GarmentCategory::all();
        $garments = \DB::table('tblSegment AS a')
                    ->leftJoin('tblGarmentCategory AS b', 'a.strSegCategoryFK', '=', 'b.strGarmentCategoryID')
                    ->select('a.*', 'b.strGarmentCategoryName') 
                    ->orderBy('a.strSegmentID')
                    ->get();

        return view('transaction-walkin-individual')
                    ->with('garments', $garments)
                    ->with('categories', $categories)
                    ->with('values', $values);
    }

    public function bulkOrder()
    {
        return view('walkin-individual-bulk-order');
    }

    public function bulkOrderCustomize()
    {
        return view('walkin-individual-bulk-order-customize');
    }

    public function bulkOrderCustomizePerPiece()
    {
        return view('walkin-individual-bulk-order-customize-per-piece');
    }

    public function bulkOrderCustomerInfo()
    {
        return view('walkin-individual-bulk-order-checkout-info');
    }

    public function bulkOrderPayment()
    {
        return view('walkin-individual-bulk-order-checkout-pay');
    }

    public function bulkOrderMeasure()
    {
        return view('walkin-individual-bulk-order-checkout-measure');
    }

    public function bulkOrderMeasureNow()
    {
        return view('walkin-individual-bulk-order-checkout-measure-now');
    }

    public function customize(Request $request)
    {   
        $data_segment = $request->input('cbx-segment-name');
        $data_quantity = array_slice(array_filter($request->input('int-segment-qty')), 0);

        $values = [];

        $segments = \DB::table('tblSegment AS a')
                    ->leftJoin('tblGarmentCategory AS b', 'a.strSegCategoryFK', '=', 'b.strGarmentCategoryID')
                    ->select('a.*', 'b.strGarmentCategoryName') 
                    ->whereIn('a.strSegmentID', $data_segment)
                    ->orderBy('a.strSegmentID')
                    ->get();        

       for($i = 0; $i < count($data_segment); $i++){
            for($j = 0; $j < $data_quantity[$i]; $j++){
                $values[] = $segments[$i];
            }
        }

        session(['segment_data' => $data_segment]);
        session(['segment_quantity' => $data_quantity]);
        session(['segment_values' => $values]);

        return redirect('transaction/walkin-individual-show-customize-orders');
    }

    public function showCustomizeOrder()
    {   
        $values = session()->get('segment_values');

        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();

        $segmentPatterns = SegmentPattern::all();
        $segmentStyles = SegmentStyle::all();

        return view('walkin-individual-customize-order')
                ->with('segments', $values)
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $segmentPatterns)
                ->with('styles', $segmentStyles); 
    }

    public function addDesign(Request $request)
    {   
        return redirect('transaction/walkin-individual-show-customize-orders');
    }

    public function catalogueDesign()
    {
        return view('walkin-individual-catalogue-design');
    }

    public function information(Request $request)
    {   
        $values = session()->get('segment_values');
        $segmentStyles = SegmentStyle::all();
        $patterns = [];
        $i = 0;

        for($i = 0; $i < count($values); $i++){
            $segmentFabric[$i] = $request->input('fabrics' . ($i+1));
        }

        for($i = 0; $i < count($values); $i++){
            for($j = 0; $j < count($segmentStyles); $j++){
                $tempPatterns = $request->input('rdb_pattern' . $segmentStyles[$j]->strSegStyleCatID . ($i+1));       
                if($tempPatterns != null){
                    $patterns[$i] = $tempPatterns;
                } 
            }
        }

        $sqlStyles = \DB::table('tblSegmentPattern AS a')
                ->leftJoin('tblSegmentStyleCategory AS b', 'a.strSegPStyleCategoryFK', '=', 'b.strSegStyleCatID')
                ->leftJoin('tblSegment AS c', 'b.strSegmentFK', '=', 'strSegmentID')
                ->select('c.strSegmentID', 'a.strSegPStyleCategoryFK', 'a.strSegPatternID', 
                         'a.strSegPName', 'b.strSegStyleName', 'a.dblPatternPrice')
                ->whereIn('a.strSegPatternID', $patterns)
                ->get();

        for($i = 0; $i < count($values); $i++){
            for($j = 0; $j < count($sqlStyles); $j++){
                if($patterns[$i] == $sqlStyles[$j]->strSegPatternID){
                    $patterns[$i] = $sqlStyles[$j];
                }
            }
        }

        $sqlFabric = \DB::table('tblFabric')
                ->select('strFabricID', 'strFabricName', 'dblFabricPrice')
                ->whereIn('strFabricID', $segmentFabric)
                ->get();

        for($i = 0; $i < count($values); $i++){
            for($j = 0; $j < count($sqlFabric); $j++){
                if($segmentFabric[$i] == $sqlFabric[$j]->strFabricID){
                    $segmentFabric[$i] = $sqlFabric[$j];
                }
            }
        }

        for($i = 0; $i < count($values); $i++){
            $values[$i]->strFabricID = $segmentFabric[$i]->strFabricID;
            $values[$i]->strFabricName = $segmentFabric[$i]->strFabricName;
            $values[$i]->dblFabricPrice = $segmentFabric[$i]->dblFabricPrice;
        }

        session(['segment_design' => $patterns]);

        $joID = \DB::table('tblJobOrder')
            ->select('strJobOrderID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strJobOrderID', 'desc')
            ->take(1)
            ->get();

        if($joID == null){
            $newID = $this->smartCounter("JOB000"); 
        }else{
            $ID = $joID["0"]->strJobOrderID;
            $newID = $this->smartCounter($ID);  
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

        session(['custID' => $custID]);
        session(['joID' => $newID]);

        return view('walkin-individual-checkout-info')
                    ->with('custID', $custID)
                    ->with('joID', $newID);
    }

    public function payment()
    {   
        $values = session()->get('segment_values');
        $styles = session()->get('segment_design');
        $fabrics = session()->get('segment_fabric');
        $joID = session()->get('joID');

        return view('walkin-individual-checkout-pay')
                    ->with('segments', $values)
                    ->with('styles', $styles)
                    ->with('joID', $joID);
    }

    public function measurement(Request $request)
    {   
        $values = session()->get('segment_values');
        $data = session()->get('segment_data');

        session(['termsOfPayment' => $request->input('termsOfPayment')]);
        session(['totalPrice' => $request->input('total_price')]);
        session(['transaction_date' => $request->input('transaction_date')]);


        $measurements = \DB::table('tblMeasurementCategory AS a')
                    ->leftJoin('tblMeasurementDetail AS b', 'a.strMeasurementCategoryID', '=', 'b.strMeasCategoryFK')
                    ->leftJoin('tblSegment AS c', 'b.strMeasDetSegmentFK', '=', 'c.strSegmentID')
                    ->select('b.*')
                    ->whereIn('b.strMeasDetSegmentFK', $data)
                    ->get();

        $measurementCategory = MeasurementCategory::all();
        $standardSizeCategory = StandardSizeCategory::all();

        return view('walkin-individual-checkout-measure')
                ->with('segments', $values)
                ->with('measurements', $measurements)
                ->with('categories', $measurementCategory)
                ->with('standard_categories', $standardSizeCategory);
    }

    public function addCustomer(Request $request)
    {
        $individual = Individual::create(array(
                    'strIndivID' => $request->input('addIndiID'),
                    'strIndivFName' => trim($request->input('addIndiFirstName')),     
                    'strIndivMName' => trim($request->input('addIndiMiddleName')),
                    'strIndivLName' => trim($request->input('addIndiLastName')),
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
        return redirect('transaction/walkin-individual-payment-info');
    }

    public function saveOrder(Request $request)
    {   
        $measDet = MeasurementDetail::get();
        $segments = session()->get('segment_values'); //tblJobSpecs
        
        $measurementDetails = [];
        $measurementName = [];
        $measurementProfile = [];

        foreach($segments as $i => $segment){
            foreach($measDet as $j => $detail){
                if($detail->strMeasDetSegmentFK == $segment->strSegmentID){
                    $measurementName[$i][$j] = $request->input('detailName' . ($i+1) . ($j+1));
                    $measurementDetails[$i][$j] = $request->input($detail->strMeasurementDetailID . ($i+1));
                    $measurementDetails[$i][$j+1] = $request->input('uom' . ($i+1));
                }
                $j++;
            }
                $measurementProfile[$i][0] =  $request->input('profile_name' . ($i+1));
                $measurementProfile[$i][1] =  $request->input('profile_sex' . ($i+1));
                $i++;
        }

        //tblJobOrder
        $tempQuantity = session()->get('segment_quantity');
        $totalQuantity = 0;

        foreach($tempQuantity as $quantity)
            $totalQuantity += $quantity; //tblJobOrder

        $jobOrderID = session()->get('joID'); //tblJobOrder
        $customerID = session()->get('custID'); //tblJobOrder
        $termsOfPayment = session()->get('termsOfPayment'); //tblJobOrder
        $modeOfPayment = "Cash"; //tblJobOrder
        $totalPrice = (double)session()->get('totalPrice'); //tblJobOrder
        $orderDate = session()->get('transaction_date'); //tblJobOrder

        $jobOrder = TransactionJobOrder::create(array(
                'strJobOrderID' => $jobOrderID,
                'strJO_CustomerFK' => $customerID,
                'strTermsOfPayment' => $termsOfPayment,
                'strModeOfPayment' => $modeOfPayment,
                'intJO_OrderQuantity' => $totalQuantity,
                'dblOrderTotalPrice' => $totalPrice,
                'dtOrderDate' => $orderDate,
                'boolIsActive' => 1
        ));

        $jobOrder->save();

        //tblJobSpecs
        $segments = session()->get('segment_values'); //tblJobSpecs
        $designs = session()->get('segment_design'); //tblJOSpecs_Design

        for($i = 0; $i < count($segments); $i++){

            $ids = \DB::table('tblJOSpecific')
                ->select('strJOSpecificID')
                ->orderBy('created_at', 'desc')
                ->orderBy('strJOSpecificID', 'desc')
                ->take(1)
                ->get();

            if($ids == null){
                $jobSpecsID = $this->smartCounter("JOS000"); 
            }else{
                $ID = $ids["0"]->strJOSpecificID;
                $jobSpecsID = $this->smartCounter($ID);  
            }

            $jobOrderSpecifics = TransactionJobOrderSpecifics::create(array(
                    'strJOSpecificID' => $jobSpecsID,
                    'strJobOrderFK' => $jobOrderID,
                    'strJOSegmentFK' => $segments[$i]->strSegmentID,
                    'strJOFabricFK' => $segments[$i]->strFabricID,
                    'intQuantity' => 1,
                    'dblUnitPrice' => $segments[$i]->dblSegmentPrice,
                    'intEstimatedDaysToFinish' => $segments[$i]->intMinDays,
                    'strEmployeeNameFK' => "EMPL001",
                    'boolIsActive' => 1
            ));

            $jobOrderSpecifics->save();

            $jobOrderSpecificsPattern = TransactionJobOrderSpecificsPattern::create(array(
                    'strJobOrderSpecificFK' => $jobSpecsID,
                    'strSegmentPatternFK' => $designs[$i]->strSegPatternID
            ));

            $jobOrderSpecificsPattern->save(); 


            //measurement profile
            $ids = \DB::table('tblJO_MeasureProfile')
                    ->select('strJOMeasureProfileID')
                    ->orderBy('created_at', 'desc')
                    ->orderBy('strJOMeasureProfileID', 'desc')
                    ->take(1)
                    ->get();

                if($ids == null){
                    $joMeasProfileID = $this->smartCounter("JOMP000"); 
                }else{
                    $ID = $ids["0"]->strJOMeasureProfileID;
                    $joMeasProfileID = $this->smartCounter($ID);  
                }

            $joMeasurementProfile = TransactionJobOrderMeasurementProfile::create(array(
                    'strJOMeasureProfileID' => $joMeasProfileID,
                    'strMeasProfCustIndivFK' => $customerID,
                    'strProfileName' => $measurementProfile[$i][0],
                    'strSex' => $measurementProfile[$i][1],
                    'boolIsActive' => 1
            ));

            $joMeasurementProfile->save();

            for($j = 0; $j < count($measurementName[$i]); $j++){
                //measurement specs
                $ids = \DB::table('tblJOMeasureSpecific')
                        ->select('strJOMeasureSpecificID')
                        ->orderBy('created_at', 'desc')
                        ->orderBy('strJOMeasureSpecificID', 'desc')
                        ->take(1)
                        ->get();

                    if($ids == null){
                        $joMeasSpecificID = $this->smartCounter("JOMP000"); 
                    }else{
                        $ID = $ids["0"]->strJOMeasureSpecificID;
                        $joMeasSpecificID = $this->smartCounter($ID);  
                    }

                    $joMeasurementProfile = TransactionJobOrderMeasurementSpecifics::create(array(
                            'strJOMeasureSpecificID' => $joMeasSpecificID,
                            'strJobOrderSpecificFK' => $jobSpecsID,
                            'strMeasureProfileFK' => $joMeasProfileID,
                            'strMeasureDetailFK' => $measurementName[$i][$j],
                            'dblMeasureValue' => $measurementDetails[$i][$j],
                            'strUnitOfMeasurement' => $measurementDetails[$i][count($measurementName[$i])],
                            'boolIsActive' => 1
                    ));

                    $joMeasurementProfile->save();
            }//end of loop for meas specs
        }//end of save loop for JO Specs




        dd("");
    }

    public function removeItem(Request $request)
    {   
        $to_be_deleted = ((int)$request->input('delete-item-id') - 1);
        $values = session()->get('segment_values');

        unset($values[$to_be_deleted]);
        $values = array_slice($values, 0);
        
        session()->forget('segment_values');
        session(['segment_values' => $values]);

        return redirect('transaction/walkin-individual-show-customize-orders');
    }

    public function clearOrder(Request $request)
    {   
        session()->forget('segment_values');
        return redirect('transaction/walkin-individual');
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

