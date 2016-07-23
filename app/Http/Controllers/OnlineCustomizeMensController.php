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
        $patterns = SegmentPattern::all();
        $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('hidden_fabric_id'))
                    ->get();

        $keycollar = 'Collar';

        $collars = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycollar.'%')
                    ->get();

        return view('customize.mens-style-collar')
                ->with('fabrics', $selectedFabric)
                ->with('patterns', $patterns)
                ->with('collars', $collars);
    }

    public function stylecuffs()
    {
        $patterns = SegmentPattern::all();
        $keysleeves = 'Slevees';

        $sleeves = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keysleeves.'%')
                    ->get();

        return view('customize.mens-style-cuffs')
                ->with('patterns', $patterns)
                ->with('sleeves', $sleeves);
        return view('customize.mens-style-cuffs');
    }

    public function stylebuttons(Request $request)
    {
        $patterns = SegmentPattern::all();
        $buttonthreads = Thread::all();
        $buttons = Button::all();
        $keybutton = 'Buttons';

        $buttons = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keybutton.'%')
                    ->get();

        $selectedThreads = \DB::table('tblThread')
                    ->select('tblThread.*')
                    ->where('tblThread.intThreadID', $request->input('hidden_thread_id'))
                    ->get();

        return view('customize.mens-style-buttons')
                ->with('buttons', $buttons);
    }

    public function stylepocketmonogram()
    {
        return view('customize.mens-style-pocket-monogram');
    }

    public function styleothers()
    {
        return view('customize.mens-style-others');
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
