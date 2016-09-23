<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use App\Individual;

use App\GarmentCategory;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\SegmentPattern;
use App\GarmentSegment;
use App\MeasurementCategory;
use App\StandardSizeCategory;

use App\TransactionJobOrder;
use App\TransactionJobOrderSpecifics;
use App\TransactionJobOrderSpecificsPattern;

use App\Thread;
use App\Button;

class OnlineIndividualController extends Controller
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
    
    public function menchoose()
    {
        $mvalues = [];
        $mdata = [];

        session(['mensegment_data' => $mdata]);
        session(['mensegment_values' => $mvalues]);

        $garmentKey = 'Men Shirt';


        $categories = GarmentCategory::all();

        $garments = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->where('tblGarmentCategory.strGarmentCategoryName', '=', $garmentKey)
            ->select('tblSegment.*')
            ->get();

        return view('customize.mens-choose-shirt')
         ->with('categories', $categories)
         ->with('garments', $garments)
         ->with('values', $mdata);
    }   

    public function menfabric(Request $request)
    {   
        $mfabric = [];

        session(['menfabric' => $mfabric]); 

        $mendata_segment = $request->input('menshirt');
        session(['mensegment_data' => $mendata_segment]);
       
        $menquantity = $request->input('menquantity');
        session(['menquantity' => $menquantity]);

        $mname = $request->input('mname');
        session(['mname' => $mname]);

        // $qty = session()->get('menquantity');
        // dd($qty);

        $msegprice = $request->input('msegprice');
        session(['mprice' => $msegprice]);

        $mdays = $request->input('mdays');
        session(['mdays' => $mdays]);

        $mqty = session()->get('menquantity');
        $msegprice = session()->get('msegprice');

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
        // }
    }

    public function menstylecollar(Request $request)
    {

        $mendata_fabric = $request->input('rdb_fabric');
        session(['menfabric' => $mendata_fabric]);

        $mfname = $request->input('mfname');
        session(['mfname' => $mfname]);

        $mfprice = $request->input('mfprice');
        session(['mfprice' => $mfprice]);

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

        $garmentKey = 'Men Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'. $data_segment = $request->input('menshirt').'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keycollar = 'Collar';
        $collars = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycollar.'%')
                    ->get();

        return view('customize.mens-style-collar')
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

    public function menstylecuffs(Request $request)
    {
        $mcollar = [];

        session(['mencollar' => $mcollar]);

        $mendata_collar = $request->input('rdb_pattern');
        session(['mencollar' => $mendata_collar]);

        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();
        
        $garmentKey = 'Men Shirt';
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

        return view('customize.mens-style-cuffs')
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

    public function menstylebuttons(Request $request)
    {
        $buttonthreads = Thread::all();
        $buttons = Button::all();

        return view('customize.mens-style-buttons')
                ->with('buttons', $buttons)
                ->with('threads', $buttonthreads);
    }

    public function menstylepocketmonogram(Request $request)
    {
        

        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $garmentKey = 'Men Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', '=', $garmentKey)
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

        return view('customize.mens-style-pocket-monogram')
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

    public function menCustomize(Request $request)
    {
       $mpocket = [];

        session(['menpocket' => $mpocket]);

        $mendata_pocket = $request->input('pocket');
        session(['menpocket' => $mendata_pocket]);

        // dd($mendata_pocket);

        return redirect('shopping-cart');
    }

    public function returnsave()
    {
        return redirect('online-order-now');
    }

    public function menstyleothers()
    {
        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();

        $garmentKey = 'Men Shirt';
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

        return view('customize.mens-style-others')
                ->with('fabrics', $fabrics)
                ->with('segments', $segment)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('plackets', $plackets);
    }

     public function womenchoose()
    {   
        $wvalues = [];
        $wdata = [];

        session(['womensegment_data' => $wdata]);
        session(['womensegment_values' => $wvalues]);

        $garmentKey = 'Women Shirt';


        $categories = GarmentCategory::all();

        $garments = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
            ->select('tblSegment.*')
            ->get();

        return view('customize.womens-choose-shirt')
         ->with('categories', $categories)
         ->with('garments', $garments)
         ->with('values', $wdata);
        
    }    

    public function womenfabric(Request $request)
    {
        $womendata_segment = $request->input('womenshirt');
        session(['womensegment_data' => $womendata_segment]);

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

    public function womenstylecollar(Request $request)
    {
         $wfabric = [];

        session(['womenfabric' => $wfabric]);

        $womendata_fabric = $request->input('rdb_fabric');
        session(['womenfabric' => $womendata_fabric]);

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

    public function womenstylecuffs()
    {
        $wcollar = [];

        session(['womencollar' => $wcollar]);

        $womendata_collar = $request->input('rdb_pattern');
        session(['womencollar' => $womendata_collar]);

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

    public function womenstylepocketmonogram()
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

    public function womenstyleothers()
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


    public function pantschoose()
    {
        $pvalues = [];
        $pdata = [];

        session(['pantssegment_data' => $pdata]);
        session(['pantssegment_values' => $pvalues]);

        $garmentKey = 'Pants';

        $categories = GarmentCategory::all();

        $garments = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->where('tblGarmentCategory.strGarmentCategoryName', '=', $garmentKey)
            ->select('tblSegment.*')
            ->get();

        return view('customize.pants-choose-pants')
         ->with('categories', $categories)
         ->with('garments', $garments)
         ->with('values', $pdata);
        
    }

    public function pantsfabric(Request $request)
    {
        $pfabric = [];

        session(['pantssfabric' => $pfabric]);

        $pantsdata_segment = $request->input('pants');
        session(['pantssegment_data' => $pantsdata_segment]);

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

    public function pantsstylepleats(Request $request)
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

    public function pantsstylepockets()
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

    public function pantsstylebottom()
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

    public function suitschoose()
    {   
        $svalues = [];
        $sdata = [];

        session(['suitsegment_data' => $sdata]);
        session(['suitsegment_values' => $svalues]);

        $garmentKey = 'Suits';


        $categories = GarmentCategory::all();

        $garments = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
            ->select('tblSegment.*')
            ->get();

        return view('customize.suit-choose-suits')
         ->with('categories', $categories)
         ->with('garments', $garments)
         ->with('values', $sdata);
        
    }

     public function suitsfabric(Request $request)
    {   
        $sfabric = [];

        session(['suitsfabric' => $sfabric]);

        $suitsdata_segment = $request->input('suits');
        session(['suitssegment_data' => $suitsdata_segment]);

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

    public function suitsstylejacket(Request $request)
    {
       $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('rdb_fabric'))
                    ->get();

        $patterns = SegmentPattern::all();
        $threads = Thread::all();

        $garmentKey = 'Suits';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keysingle = 'Single Breasted';
        $singleSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keysingle.'%')
                    ->get();

        $keydouble = 'Double Breasted';
        $doubleSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keydouble.'%')
                    ->get();

        $keyjacket = 'Bottom';
        $jacketSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyjacket.'%')
                    ->get();

        $keyvents = 'Vents';
        $ventsSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyvents.'%')
                    ->get();

        $keycollar = 'Collar';
        $keychest = 'Chest Pocket';
        $keyjacket = 'Pocket';

        $collarSegment =\DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keycollar.'%')
                    ->get();

        $chestSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keychest.'%')
                    ->get();

        $jackpotSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyjacket.'%')
                    ->get();

        return view('customize.suit-style-jacket')
            ->with('fabrics', $selectedFabric)
            ->with('segments', $segment)
            ->with('patterns', $patterns)
            ->with('ventsSegment', $ventsSegment)
            ->with('singleSegment', $singleSegment)
            ->with('doubleSegment', $doubleSegment)
            ->with('jacketSegment', $jacketSegment)
            ->with('threads', $threads)
            ->with('collarSegment', $collarSegment)
            ->with('chestSegment', $chestSegment)
            ->with('jackpotSegment', $jackpotSegment);

    }


    public function suitsstylepants()
    {
        $patterns = SegmentPattern::all();

        $key = 'Pleat';
        $pleatsSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$key.'%')
                    ->get();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->orderBy('strSegmentID')
                    ->get();

        $keypocket = 'Pocket';
        $pocketSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keypocket.'%')
                    ->get();

        $keyback = 'Backpocket';
        $backSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keyback.'%')
                    ->get();

        $keybottom = 'Bottom';
        $bottomSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$keybottom.'%')
                    ->get();

        return view('customize.suit-style-pants')
                    ->with('patterns', $patterns)
                    ->with('segments', $segment)
                    ->with('pleatsSegment', $pleatsSegment)
                    ->with('pocketSegment', $pocketSegment)
                    ->with('backSegment', $backSegment)
                    ->with('bottomSegment', $bottomSegment);

    }

    public function suitsstylemonogram()
    {
        $patterns = SegmentPattern::all();

        $keymonogram = 'Monogram';
        $monograms = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName')
                    ->where('strSegStyleName', 'LIKE', '%'.$keymonogram.'%')
                    ->get();

        return view('customize.suit-style-monogram')
                    ->with('patterns', $patterns)
                    ->with('monograms', $monograms);
    }


    public function tocart()
    {
        $men= '';
        $women = '';
        $pants = '';
        $suits = '';
        $mquantity = '';

        // $request->session()->flush();

        $men = session()->get('mensegment_data');
        $mquantity = session()->get('menquantity');

        $women = session()->get('womensegment_data');

        $pants = session()->get('pantssegment_data');

        $suit = session()->get('suitssegment_data');



        if($men == null && $women == null && $pants == null && $suit == null){

            $selected = null;

             return view('online.ordernow')
             ->with('selecteds',$selected);
        }

        elseif($men == null && $women != null && $pants == null && $suit == null){
        

            $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=' ,$women)
                    ->get();


            return view('online.ordernow')
            ->with('selecteds',$selected);
        }
        elseif ($men != null  && $women == null && $pants == null && $suit == null ) {
            
            $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected)
            ->with('mquantity', $mquantity);
        }

         else if($men == null && $women == null && $pants != null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $pants)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men == null && $women == null && $pants == null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men != null && $women == null && $pants == null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men != null && $women != null && $pants == null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $women)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men == null && $women != null && $pants == null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men != null && $women == null && $pants != null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men == null && $women != null && $pants != null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men == null && $women != null && $pants != null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $pants)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men != null && $women != null && $pants != null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men == null && $women != null && $pants != null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else if($men != null && $women != null && $pants == null && $suit != null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected);
        }

        else {

            $selected = \DB::table('tblSegment')
                    ->leftjoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=' ,$women)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->orwhere('strSegmentID', '=', $suit)
                    ->get();

            return view('online.ordernow')
                ->with('selecteds',$selected);
        }
    } 

     public function info()
    {   

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

        $custType = 0;
        session(['custType' => $custType]);
        session(['custID' => $custID]);
        session(['joID' => $newID]);


        return view('online.individual-checkout-info')                   
                    ->with('joID', $newID)
                    ->with('custID', $custID);

    }

    public function addCustomer(Request $request)
    {   //dd($request->input('strIndivSex'));

        // $mendata_collar = $request->input('rdb_pattern');
        // session(['mencollar' => $mendata_collar]);


        $individual = Individual::create(array(
                    'strIndivID' =>  session()->get('custID'),
                    'strIndivFName' => trim($request->input('addIndiFirstName')),     
                    'strIndivMName' => trim($request->input('addIndiMiddleName')),
                    'strIndivLName' => trim($request->input('addIndiLastName')),
                   // 'strIndivSex' => $request->input('strIndivSex'),
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

        //dd($request->input('strIndivSex'));

                $individual->save();
            
        return redirect('checkout-payment');
    }

    public function payment(Request $request)
    {
        $men = '';
        $women = '';
        $suits = '';
        $pants = '';
       
        $joID = session()->get('joID');

        $men = session()->get('mensegment_data');

        $mprice = session()->get('mprice');

        $mfname= session()->get('mfname');

        $mfprice = session()->get('mfprice');

        $mpocket = session()->get('menpocket');

        $mcollar = session()->get('mencollar');

        $mqty = session()->get('menquantity');

        $mname = session()->get('mname');

        $women = session()->get('womensegment_data');

        $suits = session()->get('suitsegment_data');

        $pants = session()->get('pantssegment_data');

        $vat = \DB::table('tblVat')
                    ->select('tblVat.dblTaxPercentage')
                    ->where('strTaxName', '=', 'Value Added Tax')
                    ->get();


        if ($men != null) {

             $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $mcollar)
                    ->orwhere('strSegPatternID', '=', $mpocket)
                    ->get();
        

            $mstylePrice = 0.00;
            
            for($i = 0; $i < count($styles); $i++)
            {
                $mstylePrice += $styles[$i]->dblPatternPrice;
            }

            $mlinetotal = 0.00;
            $mlinetotal = $mstylePrice + $mprice + $mfprice;

            $mtotal = $mqty * $mlinetotal;

            $grand = $mtotal;
            $totalqty = $mqty;

            session(['grand' => $grand]);
            session(['totalqty' => $totalqty]);

            $vat_total = ($grand * 12)/100;

            $estimated = $grand - $vat_total;

           


            return view('online.individual-checkout-payment')
                ->with('joID', $joID)
                ->with('mname', $mname)
                ->with('mprice', $mprice)
                ->with('mfname', $mfname)
                ->with('mfprice', $mfprice)
                ->with('mqty', $mqty)
                ->with('styles', $styles)
                ->with('mlinetotal', $mlinetotal)
                ->with('mtotal', $mtotal)
                ->with('grand', $grand)
                ->with('vat_total', $vat_total)
                ->with('estimated', $estimated);
        }


    }

    public function measuredetails()
    {
        $categories = MeasurementCategory::all();
        $standardSizeCategory = StandardSizeCategory::all();

        $men= '';
        $women = '';

        $men = session()->get('mensegment_data');

        $women = session()->get('womensegment_data');


        $measurements = \DB::table('tblMeasurementCategory AS a')
                    ->leftJoin('tblMeasurementDetail AS b', 'a.strMeasurementCategoryID', '=', 'b.strMeasCategoryFK')
                    ->leftJoin('tblSegment AS c', 'b.strMeasDetSegmentFK', '=', 'c.strSegmentID')
                    ->where('strMeasDetSegmentFK', '=', $men)
                    ->orwhere('strMeasDetSegmentFK', '=' ,$women)
                    ->select('b.*')
                    ->get();

        return view('online.individual-checkout-measurement')
            ->with('categories', $categories)
            ->with('measurements', $measurements)
            ->with('standard_categories', $standardSizeCategory);
    }

    public function saveOrder(Request $request)
    {
        $men = '';
        $women = '';
        $suits = '';
        $pants = '';

        $orderDate = $request->input('date');

        $joID = session()->get('joID');

        $custID = session()->get('custID');

        $men = session()->get('mensegment_data');

        $mfabric = session()->get('menfabric');

        $mqty = session()->get('menquantity');

        $mdays = session()->get('mdays');

        $mestDays = $mqty * $mdays;

         $mpocket = session()->get('menpocket');

        $mcollar = session()->get('mencollar');

        $women = session()->get('womensegment_data');

        $suits = session()->get('suitsegment_data');

        $pants = session()->get('pantssegment_data');

        $mode = 'CASH';

        session(['termsOfPayment' => $request->input('termsOfPayment')]);

        $terms = session()->get('termsOfPayment');

        $grand = (double)session()->get('grand');

        $totalqty = session()->get('totalqty');

        $modeOfPayment = "Cash";

        $jobOrder = TransactionJobOrder::create(array(
                'strJobOrderID' => $joID,
                'strJO_CustomerFK' => $custID,
                'strTermsOfPayment' => $terms,
                'strModeOfPayment' => $mode,
                'intJO_OrderQuantity' => $totalqty,
                'dblOrderTotalPrice' => $grand,
                'boolIsOrderAccepted' => 1,
                'dtOrderDate' => $orderDate,
                'boolIsActive' => 1,
                'boolIsOnline' => 1
                
            ));

            $jobOrder->save();

        if($men != null)
        {


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
                            'strJobOrderFK' => $joID,
                            'strJOSegmentFK' => $men,
                            'strJOFabricFK' => $mfabric,
                            'intQuantity' => $mqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $mestDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
            //}
                    //dd($jobSpecsID);    
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $mcollar)
                    ->orwhere('strSegPatternID', '=', $mpocket)
                    ->get();

                  for($i = 0; $i < count($styles); $i++)
                    {
                        
                        
                         $jobOrderSpecificsPattern = TransactionJobOrderSpecificsPattern::create(array(
                            'strJobOrderSpecificFK' => $jobSpecsID,
                            'strSegmentPatternFK' => $styles[$i]->strSegPatternID
                        ));  
                         

                        $jobOrderSpecificsPattern->save();

                    }

        }



        return view('online.homepage');
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
