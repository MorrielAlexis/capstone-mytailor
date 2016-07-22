<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\SegmentStyle;
use App\SegmentPattern;
use App\GarmentCategory;
use App\GarmentSegment;

class OnlineCustomizeSuitController extends Controller
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

        return view('customize.suit-fabric')
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns);
    }

    public function stylejacket(Request $request)
    {
       $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('hidden_fabric_id'))
                    ->get();

        return view('customize.suit-style-jacket')
            ->with('fabrics', $selectedFabric);
    }

    public function stylecollarpocket()
    {
        return view('customize.suit-style-collar-pocket');
    }

    public function stylepants()
    {
        return view('customize.suit-style-pants');
    }

    public function stylemonogram()
    {
        return view('customize.suit-style-monogram');
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
