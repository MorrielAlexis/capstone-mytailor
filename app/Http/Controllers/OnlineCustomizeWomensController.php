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

class OnlineCustomizeWomensController extends Controller
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

    public function choose()
    {   
        $garmentKey = 'Women Shirt';

        $segments = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
            ->select('tblSegment.*')
            ->get();

        return view('customize.womens-choose-shirt')
         ->with('segments', $segments);
        
    }    

    public function fabric()
    {
        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();

        return view('customize.womens-fabric')
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

        $garmentKey = 'Women Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keycollar = 'Collar';
        $collars = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycollar.'%')
                    ->get();

        return view('customize.womens-style-collar')
                ->with('contrasts', $contrast)
                ->with('segments', $segment)
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

        $garmentKey = 'Women Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keysleeves = 'Slevee';
        $sleeves = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keysleeves.'%')
                    ->get();

        $keycuffs = 'Cuff';
        $cuffs = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycuffs.'%')
                    ->get();

        $keycufflinks = 'cufflinks';
        $cufflinks =  \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycufflinks.'%')
                    ->get();

        return view('customize.womens-style-cuffs')
                ->with('contrasts', $contrast)
                ->with('segments', $segment)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $patterns)
                ->with('cuffs', $cuffs)
                ->with('cufflinks', $cufflinks)
                ->with('sleeves', $sleeves);
    }    

    public function stylebuttons()
    {
        $buttonthreads = Thread::all();
        $buttons = Button::all();

        return view('customize.womens-style-buttons')
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

        $garmentKey = 'Women Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keypocket = 'Shirt Pocket';
        $pockets = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keypocket.'%')
                    ->get();

        $keymonogram = 'Monogram';
        $monograms = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keymonogram.'%')
                    ->get();

        return view('customize.womens-style-pocket-monogram')
                ->with('contrasts', $contrast)
                ->with('segments', $segment)
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

        $garmentKey = 'Women Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keyplacket = 'Placket';
        $plackets = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyplacket.'%')
                    ->get();

        return view('customize.womens-style-others')
                ->with('fabrics', $fabrics)
                ->with('segments', $segment)
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
