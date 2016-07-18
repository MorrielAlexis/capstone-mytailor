<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\GarmentCategory;
use App\FabricType;
use App\Individual;
use App\Segment;
use App\SegmentPattern;
use App\SegmentStyle;

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
        $categories = GarmentCategory::all();

        $garments = \DB::table('tblSegment AS a')
                    ->leftJoin('tblGarmentCategory AS b', 'a.strSegCategoryFK', '=', 'b.strGarmentCategoryID')
                    ->select('a.*', 'b.strGarmentCategoryName') 
                    ->orderBy('a.strSegmentID')
                    ->get();

        return view('transaction-walkin-individual')
                    ->with('garments', $garments)
                    ->with('categories', $categories);
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
        session(['segment_values' => $values]);

        $segment_style = 
        $fabrics = FabricType::all();
        $segmentPatterns = SegmentPattern::all();

        return redirect('transaction/walkin-individual-show-customize-orders');
    }

    public function showCustomizeOrder()
    {   
        $values = session()->get('segment_values');
        $fabrics = FabricType::all();
        $segmentPatterns = SegmentPattern::all();
        $segmentStyles = SegmentStyle::all();

        return view('walkin-individual-customize-order')
                ->with('segments', $values)
                ->with('fabrics', $fabrics)
                ->with('patterns', $segmentPatterns)
                ->with('styles', $segmentStyles); 
    }

    public function catalogueDesign()
    {
        return view('walkin-individual-catalogue-design');
    }

    public function information(Request $request)
    {   
        $a = [];

        for($i = 0; $i < count(session()->get('segment_values')); $i++){
            $a[$i] = $request->input('rdb-pattern' . strval($i+1));
            var_dump($i+1);
        }
        
        //get all the individuals
        $ids = \DB::table('tblCustIndividual')
            ->select('strIndivID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strIndivID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strIndivID;
        $newID = $this->smartCounter($ID);  

        $individual = Individual::all();                   

        return view('walkin-individual-checkout-info')
                    ->with('newID', $newID);;
    }

    public function payment()
    {   
        $values = session()->get('segment_values');

        return view('walkin-individual-checkout-pay')
                    ->with('segments', $values);
    }

    public function measurement()
    {   
        $values = session()->get('segment_values');
        $data = session()->get('segment_data');


        /*$measurements = \DB::table('tblSegment AS a')
                    ->leftJoin('tblMeasurementCategory AS b', 'a.strSegmentID', '=', 'strMeasSegmentFK')
                    ->leftJoin('tblMeasurementDetail AS c', 'b.strMeasDetFK', '=', 'c.strMeasurementDetailID')
                    ->select('c.strMeasurementDetailName')
                    ->whereIn('b.strMeasSegmentFK', $data)
                    ->get();*/
        $measurements = \DB::table('tblMeasurementCategory AS b')
                    ->leftJoin('tblMeasurementDetail AS c', 'b.strMeasDetFK', '=', 'c.strMeasurementDetailID')
                    ->select('b.strMeasCatID', 'b.strMeasSegmentFK', 'c.strMeasurementDetailName')
                    ->get();

        return view('walkin-individual-checkout-measure')
                ->with('segments', $values)
                ->with('measurements', $measurements);
    }

    public function removeItem(Request $request)
    {   
        $to_be_deleted = ((int)$request->input('delete-item-id') - 1);
        $values = session()->get('segment_values');

        unset($values[$to_be_deleted]);
        $values = array_slice($values, 0);
        
        session()->forget('segment_values');
        session(['segment_values' => $values]);

        $fabrics = FabricType::all();
        $segmentPatterns = SegmentPattern::all();

        return redirect('transaction/walkin-individual-show-customize-orders');
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

