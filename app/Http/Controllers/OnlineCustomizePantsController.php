<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\SegmentPattern;
use App\SegmentStyle;

class OnlineCustomizePantsController extends Controller
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
        //
    }

    public function fabric()
    {
        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();

        return view('customize.pants-fabric')
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns);
    }    

    public function stylepleats(Request $request)
    {
        $pattern = SegmentPattern::all();
        $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('rdb_fabric'))
                    ->get();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->orderBy('strSegmentID')
                        ->get();

        $key = 'Pleat';
        $pleatsSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$key.'%')
                    ->get();

        return view('customize.pants-style-pleats')
            ->with('pattern', $pattern)
            ->with('segments', $segment)
            ->with('style', $pleatsSegment)
            ->with('fabrics', $selectedFabric);
    }   

    public function stylepockets()
    {
        $patterns = SegmentPattern::all();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->orderBy('strSegmentID')
                        ->get();

        $keypocket = 'Pants Pocket';
        $pocketSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keypocket.'%')
                    ->get();

        $keyback = 'Backpockets';
        $backSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyback.'%')
                    ->get();

        return view('customize.pants-style-pockets')
                    ->with('patterns', $patterns)
                    ->with('segments', $segment)
                    ->with('pocketSegment', $pocketSegment)
                    ->with('backSegment', $backSegment);
    }   

    public function stylebottom()
    {
        $pattern = SegmentPattern::all();


        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->orderBy('strSegmentID')
                        ->get();

        $keybottom = 'Pants Bottom';
        $style = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keybottom.'%')
                    ->get();

        return view('customize.pants-style-bottom')
                    ->with('patterns', $pattern)
                    ->with('segments', $segment)
                    ->with('style', $style);
    }  

    public function tocart()
    {
        return redirect('online-order-now');
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
