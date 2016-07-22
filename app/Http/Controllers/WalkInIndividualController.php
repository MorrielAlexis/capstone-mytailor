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

/*        for($i = 0; $i < count($data_segment); $i++){
            $values[$i][0] = $segments->strSegmentID;
            $values[$i][1] = $segments->strSegmentName;
            $values[$i][2] = $segments->dblSegmentPrice;
            $values[$i][3] = $segments->strSegmentSex;
            $values[$i][4] = $segments->strSegmentImage;
            $values[$i][5] = $segments->strGarmentCategoryName;
        }*/

       for($i = 0; $i < count($data_segment); $i++){
            for($j = 0; $j < $data_quantity[$i]; $j++){
                $values[] = $segments[$i];
            }
        }

        session(['segment_data' => $data_segment]);
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
        $i = 0;

        for($i = 0; $i < count($values); $i++){
            $segmentFabric[$i] = $request->input('fabrics' . ($i+1));
        }

        foreach($segmentStyles as $i => $segmentStyle){
            $tempPatterns[$i++] = $request->input('rdb_pattern' . $segmentStyle->strSegStyleCatID);
        }

        $patterns = array_slice(array_filter($tempPatterns), 0);

        $sqlStyles = \DB::table('tblSegmentPattern AS a')
                ->leftJoin('tblSegmentStyleCategory AS b', 'a.strSegPStyleCategoryFK', '=', 'b.strSegStyleCatID')
                ->leftJoin('tblSegment AS c', 'b.strSegmentFK', '=', 'strSegmentID')
                ->select('c.strSegmentID', 'a.strSegPStyleCategoryFK', 'a.strSegPatternID', 
                         'a.strSegPName', 'b.strSegStyleName', 'a.dblPatternPrice')
                ->whereIn('a.strSegPatternID', $patterns)
                ->get();

        $sqlFabric = \DB::table('tblFabric')
                ->select('strFabricID', 'strFabricName', 'dblFabricPrice')
                ->whereIn('strFabricID', $segmentFabric)
                ->get();

        for($i = 0; $i < count($values); $i++){
            $values[$i]->strFabricID = $sqlFabric[$i]->strFabricID;
            $values[$i]->strFabricName = $sqlFabric[$i]->strFabricName;
            $values[$i]->dblFabricPrice = $sqlFabric[$i]->dblFabricPrice;
        }

        session(['segment_design' => $sqlStyles]);

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

        return view('walkin-individual-checkout-info')
                    ->with('custID', $custID)
                    ->with('joID', $newID);
    }

    public function payment()
    {   
        $values = session()->get('segment_values');
        $styles = session()->get('segment_design');
        $fabrics = session()->get('segment_fabric');

        return view('walkin-individual-checkout-pay')
                    ->with('segments', $values)
                    ->with('styles', $styles);
    }

    public function measurement()
    {   
        $values = session()->get('segment_values');
        $data = session()->get('segment_data');

        $measurements = \DB::table('tblMeasurementCategory AS a')
                    ->leftJoin('tblMeasurementDetail AS b', 'a.strMeasurementCategoryID', '=', 'b.strMeasCategoryFK')
                    ->leftJoin('tblSegment AS c', 'b.strMeasDetSegmentFK', '=', 'c.strSegmentID')
                    ->select('b.*')
                    ->whereIn('b.strMeasDetSegmentFK', $data)
                    ->get();

        $measurementCategory = MeasurementCategory::all();

        return view('walkin-individual-checkout-measure')
                ->with('segments', $values)
                ->with('measurements', $measurements)
                ->with('categories', $measurementCategory);
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

