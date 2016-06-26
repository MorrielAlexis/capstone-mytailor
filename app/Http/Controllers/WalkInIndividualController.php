<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\GarmentCategory;
use App\FabricType;
use App\SegmentPattern;

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
                    ->get();        

        for($i = 0; $i < count($data_segment); $i++){
            for($j = 0; $j < $data_quantity[$i]; $j++){
                $values[] = $segments[$i];
            }
        }

        session(['segment_data' => $data_segment]);
        session(['segment_quantity' => $data_quantity]);
        session(['segment_values' => $values]);


        $fabrics = FabricType::all();
        $segmentPatterns = SegmentPattern::all();

        return view('walkin-individual-customize-order')
                ->with('segments', $values)
                ->with('quantities', session()->get('segment_quantity'))
                ->with('fabrics', $fabrics)
                ->with('patterns', $segmentPatterns);
    }

    public function catalogueDesign()
    {
        return view('walkin-individual-catalogue-design');
    }

    public function information()
    {
        return view('walkin-individual-checkout-info');
    }

    public function payment()
    {
        return view('walkin-individual-checkout-pay');
    }

    public function measurement()
    {
        return view('walkin-individual-checkout-measure');
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
}
