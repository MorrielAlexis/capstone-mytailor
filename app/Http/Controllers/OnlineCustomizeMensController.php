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

use App\Thread;
use App\Button;

class OnlineCustomizeMensController extends Controller
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

        return view('customize.mens-fabric')
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns);
    }

    public function stylecollar(Request $request)
    {
        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('rdb_fabric'))
                    ->get();

        $keycollar = 'Collar';
        $collars = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycollar.'%')
                    ->get();

        return view('customize.mens-style-collar')
                ->with('contrasts', $contrast)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('fabrics', $selectedFabric)
                ->with('patterns', $patterns)
                ->with('collars', $collars);
    }

    public function stylecuffs()
    {
        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $keysleeves = 'Slevee';
        $sleeves = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keysleeves.'%')
                    ->get();

        $keycuffs = 'Cuff';
        $cuffs = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycuffs.'%')
                    ->get();

        $keycufflinks = 'cufflinks';
        $cufflinks =  \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycufflinks.'%')
                    ->get();

        return view('customize.mens-style-cuffs')
                ->with('contrasts', $contrast)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $patterns)
                ->with('cuffs', $cuffs)
                ->with('cufflinks', $cufflinks)
                ->with('sleeves', $sleeves);
    }

    public function stylebuttons(Request $request)
    {
        $buttonthreads = Thread::all();
        $buttons = Button::all();

        return view('customize.mens-style-buttons')
                ->with('buttons', $buttons)
                ->with('threads', $buttonthreads);
    }

    public function stylepocketmonogram()
    {
        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $keypocket = 'Shirt Pocket';
        $pockets = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keypocket.'%')
                    ->get();

        $keymonogram = 'Monogram';
        $monograms = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keymonogram.'%')
                    ->get();

        return view('customize.mens-style-pocket-monogram')
                ->with('contrasts', $contrast)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $patterns)
                ->with('pockets', $pockets)
                ->with('monograms', $monograms);
    }

    public function styleothers()
    {
        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $keyplacket = 'Placket';
        $plackets = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyplacket.'%')
                    ->get();

        return view('customize.mens-style-others')
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('plackets', $plackets);
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
