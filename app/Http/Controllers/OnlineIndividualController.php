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

use Carbon\Carbon;

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

        session(['mfabric' => $mfabric]); 
       
        $mqty = $request->input('menquantity');
        session(['mqty' => $mqty]);

        $mensegment= \DB::table('tblSegment')
                    ->select('tblSegment.*')
                    ->where('tblSegment.strSegmentID', '=', $request->input('menshirt'))
                    ->get();
        
        
                for($i = 0; $i < count($mensegment); $i++)
                {
                    $mid = $mensegment[$i]->strSegmentID;
                    $mname = $mensegment[$i]->strSegmentName;
                    $mprice = $mensegment[$i]->dblSegmentPrice;
                    $mdays = $mensegment[$i]->intMinDays;
                }

                 session(['mid' => $mid]);
                 session(['mname' => $mname]);
                 session(['mprice' => $mprice]);
                 session(['mdays' => $mdays]);

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

        $menfabric = \DB::table('tblFabric')
                        ->select('tblFabric.*')
                        ->where('strFabricID', '=', $request->input('mfabric'))
                        ->get();
      
                for($i = 0; $i < count($menfabric); $i++)
                {
                    $mfid = $menfabric[$i]->strFabricID;
                    $mfname = $menfabric[$i]->strFabricName;
                    $mfprice = $menfabric[$i]->dblFabricPrice;
                }
                 session(['mfid' => $mfid]);
                 session(['mfname' => $mfname]);
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
                    ->where('a.strFabricID', $request->input('mfabric'))
                    ->get();

        // dd(session()->get('mensegment_data'));
        $garmentKey = 'Men Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->where('tblSegment.strSegmentID', '=', session()->get('mid'))
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


        $mcollar = $request->input('mcollar');
        session(['mcollar' => $mcollar]);

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
                    ->where('tblSegment.strSegmentID', '=', session()->get('mid'))
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
                    ->where('tblSegment.strSegmentID', '=', session()->get('mid'))
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

        session(['mpocket' => $mpocket]);

        $mendata_pocket = $request->input('mpocket');
        session(['mpocket' => $mendata_pocket]);

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
        $wfabric = [];

        session(['menfabric' => $wfabric]); 
       
        $wqty = $request->input('womenquantity');
        session(['wqty' => $wqty]);

        $womensegment= \DB::table('tblSegment')
                    ->select('tblSegment.*')
                    ->where('tblSegment.strSegmentID', '=', $request->input('womenshirt'))
                    ->get();

        
        
                for($i = 0; $i < count($womensegment); $i++)
                {
                    $wid = $womensegment[$i]->strSegmentID;
                    $wname = $womensegment[$i]->strSegmentName;
                    $wprice = $womensegment[$i]->dblSegmentPrice;
                    $wdays = $womensegment[$i]->intMinDays;
                }

                 session(['wid' => $wid]);
                 session(['wname' => $wname]);
                 session(['wprice' => $wprice]);
                 session(['wdays' => $wdays]);

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
        $womenfabric = \DB::table('tblFabric')
                        ->select('tblFabric.*')
                        ->where('strFabricID', '=', $request->input('wfabric'))
                        ->get();

                for($i = 0; $i < count($womenfabric); $i++)
                {
                    $wfid = $womenfabric[$i]->strFabricID;
                    $wfname = $womenfabric[$i]->strFabricName;
                    $wfprice = $womenfabric[$i]->dblFabricPrice;
                }

                session(['wfid' => $wfid]);
                session(['wfname' => $wfname]);
                session(['wfprice' => $wfprice]);
        


        $contrast = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();
        $patterns = SegmentPattern::all();


        $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', '=', $request->input('wfabric'))
                    ->get();

        $garmentKey = 'Women Shirt';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->where('tblSegment.strSegmentID', '=', session()->get('wid'))
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

    public function womenstylecuffs(Request $request)
    {

        $wcollar = $request->input('wcollar');
        session(['wcollar' => $wcollar]);



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
                    ->where('tblSegment.strSegmentID', '=', session()->get('wid'))
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

    public function womenstylebuttons(Request $request)
    {

        $wsleeve = $request->input('wsleeve');

        session(['wsleeve' => $wsleeve]);

        $wcuff = $request->input('wcuff');
        session(['wcuff' => $wcuff]);


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
                    ->where('tblSegment.strSegmentID', '=', session()->get('wid'))
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
                    ->where('tblSegment.strSegmentID', '=', session()->get('wid'))
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

    public function womenCustomize(Request $request)
    {
       $wpocket = [];

        session(['wpocket' => $wpocket]);

        $wpocket = $request->input('pocket');
        session(['wpocket' => $wpocket]);

         // dd($wpocket);

        return redirect('shopping-cart');
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
        $pqty = $request->input('pantsquantity');
        session(['pqty' => $pqty]);

        $pantssegment= \DB::table('tblSegment')
                    ->select('tblSegment.*')
                    ->where('tblSegment.strSegmentID', '=', $request->input('pants'))
                    ->get();
        
        
                for($i = 0; $i < count($pantssegment); $i++)
                {
                    $pid = $pantssegment[$i]->strSegmentID;
                    $pname = $pantssegment[$i]->strSegmentName;
                    $pprice = $pantssegment[$i]->dblSegmentPrice;
                    $pdays = $pantssegment[$i]->intMinDays;
                }

                 session(['pid' => $pid]);
                 session(['pname' => $pname]);
                 session(['pprice' => $pprice]);
                 session(['pdays' => $pdays]);


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
        $pantsfabric = \DB::table('tblFabric')
                        ->select('tblFabric.*')
                        ->where('strFabricID', '=', $request->input('pfabric'))
                        ->get();

                for($i = 0; $i < count($pantsfabric); $i++)
                {
                    $pfid = $pantsfabric[$i]->strFabricID;
                    $pfname = $pantsfabric[$i]->strFabricName;
                    $pfprice = $pantsfabric[$i]->dblFabricPrice;
                }

                session(['pfid' => $pfid]);
                session(['pfname' => $pfname]);
                session(['pfprice' => $pfprice]);

        $pattern = SegmentPattern::all();
        $selectedFabric = \DB::table('tblFabric AS a')
                    ->leftJoin('tblFabricType AS b', 'a.strFabricTypeFK', '=','b.strFabricTypeID')
                    ->select('a.*', 'b.strFabricTypeName')
                    ->where('a.strFabricID', $request->input('pfabric'))
                    ->get();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->where('tblSegment.strSegmentID', '=', session()->get('pid'))
                        ->orderBy('strSegmentID')
                        ->get();

        $key = 'Pleat';
        $pleatsSegment = \DB::table('tblSegmentStyleCategory')
                    ->select('strSegStyleCatID', 'strSegStyleName', 'strSegmentFK', 'boolIsActive')
                    ->where('strSegStyleName', 'LIKE', '%'.$key.'%')
                    ->get();
        

        return view('customize.pants-style-pleats')
            ->with('patterns', $pattern)
            ->with('segments', $segment)
            ->with('styles', $pleatsSegment)
            ->with('fabrics', $selectedFabric);
    }   

    public function pantsstylepockets(Request $request)
    {
        $ppleats = $request->input('ppleats');
        session(['ppleats' => $ppleats]);

        $patterns = SegmentPattern::all();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->where('tblSegment.strSegmentID', '=', session()->get('pid'))
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
                    ->with('pocketSegments', $pocketSegment)
                    ->with('backSegments', $backSegment);
    }   

    public function pantsstylebottom(Request $request)
    {
        $ppocket = $request->input('ppocket');
        session(['ppocket' => $ppocket]);

        $pattern = SegmentPattern::all();

        $garmentKey = 'Pants';
        $segment = \DB::table('tblSegment')
                        ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                        ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                        ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                        ->where('tblSegment.strSegmentID', '=', session()->get('pid'))
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
                    ->with('styles', $style);
    }

    public function pantsCustomize(Request $request)
    {
        $pbottom = $request->input('pbottom');
        session(['pbottom' => $pbottom]);

         // dd($wpocket);

        return redirect('shopping-cart');
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
            ->where('tblGarmentCategory.strGarmentCategoryName', '=', $garmentKey)
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

        $sqty = $request->input('suitquantity');
        session(['sqty' => $sqty]);

        $suitsegment= \DB::table('tblSegment')
                    ->select('tblSegment.*')
                    ->where('tblSegment.strSegmentID', '=', $request->input('suits'))
                    ->get();

        
        
                for($i = 0; $i < count($suitsegment); $i++)
                {
                    $sid = $suitsegment[$i]->strSegmentID;
                    $sname = $suitsegment[$i]->strSegmentName;
                    $sprice = $suitsegment[$i]->dblSegmentPrice;
                    $sdays = $suitsegment[$i]->intMinDays;
                }

                 session(['sid' => $sid]);
                 session(['sname' => $sname]);
                 session(['sprice' => $sprice]);
                 session(['sdays' => $sdays]);

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
       $suitfabric = \DB::table('tblFabric')
                        ->select('tblFabric.*')
                        ->where('strFabricID', '=', $request->input('sfabric'))
                        ->get();

                for($i = 0; $i < count($suitfabric); $i++)
                {
                    $sfid = $suitfabric[$i]->strFabricID;
                    $sfname = $suitfabric[$i]->strFabricName;
                    $sfprice = $suitfabric[$i]->dblFabricPrice;
                }

                session(['sfid' => $sfid]);
                session(['sfname' => $sfname]);
                session(['sfprice' => $sfprice]);
        $patterns = SegmentPattern::all();
        $threads = Thread::all();

        $garmentKey = 'Suits';
        $segment = \DB::table('tblSegment')
                    ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                    ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')
                    ->where('tblGarmentCategory.strGarmentCategoryName', 'LIKE', '%'.$garmentKey.'%')
                    ->where('tblSegment.strSegmentID', '=', session()->get('wid'))
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
                    ->where('tblSegment.strSegmentID', '=', session()->get('sid'))
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


    public function tocart(Request $request)
    {
        $men= '';
        $women = '';
        $pants = '';
        $suits = '';

        // $request->session()->flush();

        $men = session()->get('mid');

        $mqty = session()->get('mqty');

        $women = session()->get('wid');
        $wqty = session()->get('wqty');


        $pants = session()->get('pid');
        $pqty = session()->get('pqty');

        $suit = session()->get('suitssegment_data');
        $sqty = session()->get('suitquantity');

        // dd($men,$women,$pants,$suit);


        if($men == null && $women == null && $pants == null && $suit == null){

            $selected = null;

             return view('online.ordernow')
             ->with('selecteds',$selected);
        }

        elseif($men == null && $women != null && $pants == null && $suit == null){
        

            $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $women)
                    ->get();


            return view('online.ordernow')
            ->with('selecteds',$selected)
            ->with('wqty', $wqty);
        }
        elseif ($men != null  && $women == null && $pants == null && $suit == null ) {
            
            $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $men)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected)
            ->with('mqty', $mqty);
        }

         else if($men == null && $women == null && $pants != null && $suit == null){
             $selected = \DB::table('tblSegment')
                    ->leftJoin('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
                    ->select('tblSegment.*', 'tblGarmentCategory.*')
                    ->where('strSegmentID', '=', $pants)
                    ->get();

            return view('online.ordernow')
            ->with('selecteds',$selected)
            ->with('pqty', $pqty);;
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
            ->with('selecteds',$selected)
            ->with('mqty', $mqty)
            ->with('wqty', $wqty);
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
            ->with('selecteds',$selected)
            ->with('mqty', $mqty)
            ->with('wqty', $wqty)
            ->with('pqty', $pqty);
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

     public function info(Request $request)
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


        // $request->session()->flush();
        
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

    
    public function measuredetails()
    {
        $categories = MeasurementCategory::all();
        $standardSizeCategory = StandardSizeCategory::all();

        $men= '';
        $women = '';

        $pants = '';

        $men = session()->get('mid');

        $women = session()->get('wid');

        $pants = session()->get('pid');



        $segments  = \DB::table('tblSegment')
                    ->select('strSegmentName', 'strSegmentID', 'strSegmentImage')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=', $women)
                    ->orwhere('strSegmentID', '=', $pants)
                    ->get();

        $measurements = \DB::table('tblMeasurementCategory AS a')
                    ->leftJoin('tblMeasurementDetail AS b', 'a.strMeasurementCategoryID', '=', 'b.strMeasCategoryFK')
                    ->leftJoin('tblSegment AS c', 'b.strMeasDetSegmentFK', '=', 'c.strSegmentID')
                    ->where('strMeasDetSegmentFK', '=', $men)
                    ->orwhere('strMeasDetSegmentFK', '=', $women)
                    ->orwhere('strMeasDetSegmentFK', '=', $pants)
                    ->select('b.*')
                    ->get();

        return view('online.individual-checkout-measurement')
            ->with('categories', $categories)
            ->with('measurements', $measurements)
            ->with('segments', $segments)
            ->with('standard_categories', $standardSizeCategory);
    }

    public function payment(Request $request)
    {

        $men = '';
        $women = '';
        $suits = '';
        $pants = '';
       
        $joID = session()->get('joID');

        $men = session()->get('mid');

        $mname = session()->get('mname');

        $mprice = session()->get('mprice');

        $mfid = session()->get('mfid');

        $mfname = session()->get('mfname');

        $mfprice = session()->get('mfprice');

        $mpocket = session()->get('mpocket');

        $mcollar = session()->get('mcollar');

        $mqty = session()->get('mqty');



        $women = session()->get('wid');

        $wname = session()->get('wname');

        $wprice = session()->get('wprice');

        $wfprice =  session()->get('wfprice');

        $wfid = session()->get('wfid');

        $wfname = session()->get('wfname');

        $wcollar = session()->get('wcollar');

        $wpocket = session()->get('wpocket');

        $wcuff = session()->get('wcuff');

        $wsleeve = session()->get('wsleeve');

        $wqty = session()->get('wqty');


        $pants = session()->get('pid');

        $pname = session()->get('pname');

        $pprice = session()->get('pprice');

        $pfid = session()->get('pfid');

        $pfname = session()->get('pfname');

        $pfprice = session()->get('pfprice');

        $ppocket = session()->get('ppocket');

        $ppleats = session()->get('ppleats');

        $pbottom = session()->get('pbottom');

        $pqty = session()->get('pqty');




        $suits = session()->get('suitsegment_data');

        $vats = \DB::table('tblVat')
                    ->select('tblVat.dblTaxPercentage')
                    ->where('strTaxName', '=', 'Value Added Tax')
                    ->get();

            for($i = 0; $i < count($vats); $i++)
                {
                    $vat = $vats[$i]->dblTaxPercentage;
                }

                 session(['vat' => $vat]);

         $vat = session()->get('vat');

        if ($men != null && $women == null && $pants == null)
        {

                $msegment = 1;
                $wsegment = 0;
                $psegment = 0;

                $mstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $mcollar)
                        ->orwhere('strSegPatternID', '=', $mpocket)
                        ->get();

                $mstylePrice = 0.00;
                
                for($i = 0; $i < count($mstyles); $i++)
                {
                    $mstylePrice += $mstyles[$i]->dblPatternPrice;
                }

                $mlinetotal = 0.00;

                $mlinetotal = $mstylePrice + $mprice + $mfprice;

                $mtotal = $mqty * $mlinetotal;

                $grand = $mtotal;
                $totalqty = $mqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

               


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('mname', $mname)
                    ->with('mprice', $mprice)
                    ->with('mfname', $mfname)
                    ->with('mfprice', $mfprice)
                    ->with('mqty', $mqty)
                    ->with('mstyles', $mstyles)
                    ->with('mlinetotal', $mlinetotal)
                    ->with('mtotal', $mtotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }

        else if ($men == null && $women != null && $pants == null)
        {

                $msegment = 0;
                $wsegment = 1;
                $psegment = 0;

                $wstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $wpocket)
                        ->orwhere('strSegPatternID', '=', $wcollar)
                        ->orwhere('strSegPatternID', '=', $wcuff)
                        ->orwhere('strSegPatternID', '=', $wsleeve)
                        ->get();

                $wstylePrice = 0.00;
                
                for($i = 0; $i < count($wstyles); $i++)
                {
                    $wstylePrice += $wstyles[$i]->dblPatternPrice;
                }

                $wlinetotal = 0.00;

                $wlinetotal = $wstylePrice + $wprice + $wfprice;

                $wtotal = $wqty * $wlinetotal;

                $grand = $wtotal;
                $totalqty = $wqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

               
                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('wname', $wname)
                    ->with('wprice', $wprice)
                    ->with('wfname', $wfname)
                    ->with('wfprice', $wfprice)
                    ->with('wqty', $wqty)
                    ->with('wstyles', $wstyles)
                    ->with('wlinetotal', $wlinetotal)
                    ->with('wtotal', $wtotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('psegment', $psegment)
                    ->with('wsegment', $wsegment);
        }

        else if ($men == null && $women == null && $pants != null)
        {

                $msegment = 0;
                $wsegment = 0;
                $psegment = 1;

                $pstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $ppleats)
                        ->orwhere('strSegPatternID', '=', $ppocket)
                        ->orwhere('strSegPatternID', '=', $pbottom)
                        ->get();

                $pstylePrice = 0.00;
                
                for($i = 0; $i < count($pstyles); $i++)
                {
                    $pstylePrice += $pstyles[$i]->dblPatternPrice;
                }

                $plinetotal = 0.00;

                $plinetotal = $pstylePrice + $pprice + $pfprice;

                $ptotal = $pqty * $plinetotal;

                $grand = $ptotal;
                $totalqty = $pqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

               


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('pname', $pname)
                    ->with('pprice', $pprice)
                    ->with('pfname', $pfname)
                    ->with('pfprice', $pfprice)
                    ->with('pqty', $pqty)
                    ->with('pstyles', $pstyles)
                    ->with('plinetotal', $plinetotal)
                    ->with('ptotal', $ptotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }
        else if ($men != null && $women != null && $pants == null)
        {
            
            $msegment = 1;
            $wsegment = 1;
            $psegment = 0;
               

            $mstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $mcollar)
                        ->orwhere('strSegPatternID', '=', $mpocket)
                        ->get();

                $mstylePrice = 0.00;
                
                for($i = 0; $i < count($mstyles); $i++)
                {
                    $mstylePrice += $mstyles[$i]->dblPatternPrice;
                }

                $mlinetotal = 0.00;
                $mlinetotal = $mstylePrice + $mprice + $mfprice;

                $wstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $wpocket)
                        ->orwhere('strSegPatternID', '=', $wcollar)
                        ->orwhere('strSegPatternID', '=', $wcuff)
                        ->orwhere('strSegPatternID', '=', $wsleeve)
                        ->get();

                $wstylePrice = 0.00;
                
                for($i = 0; $i < count($wstyles); $i++)
                {
                    $wstylePrice += $wstyles[$i]->dblPatternPrice;
                }

                $wlinetotal = 0.00;
                $wlinetotal = $wstylePrice + $wprice + $wfprice;

                $wtotal = $wqty * $wlinetotal;

                $mtotal = $mqty * $mlinetotal;

                $grand = $mtotal + $wtotal;
                $totalqty = $mqty + $wqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

             


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('mname', $mname)
                    ->with('wname', $wname)
                    ->with('mprice', $mprice)
                    ->with('wprice', $wprice)
                    ->with('mfname', $mfname)
                    ->with('mfprice', $mfprice)
                    ->with('mname', $mname)
                    ->with('mprice', $mprice)
                    ->with('wfname', $wfname)
                    ->with('wfprice', $wfprice)
                    ->with('mqty', $mqty)
                    ->with('wqty', $wqty)
                    ->with('mstyles', $mstyles)
                    ->with('wstyles', $wstyles)
                    ->with('mlinetotal', $mlinetotal)
                    ->with('wlinetotal', $wlinetotal)
                    ->with('mtotal', $mtotal)
                    ->with('wtotal', $wtotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }

        else if ($men != null && $women == null && $pants != null)
        {
            
            $msegment = 1;
            $wsegment = 0;
            $psegment = 1;
               

            $mstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $mcollar)
                        ->orwhere('strSegPatternID', '=', $mpocket)
                        ->get();

                $mstylePrice = 0.00;
                
                for($i = 0; $i < count($mstyles); $i++)
                {
                    $mstylePrice += $mstyles[$i]->dblPatternPrice;
                }

                $mlinetotal = 0.00;
                $mlinetotal = $mstylePrice + $mprice + $mfprice;

                $pstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $ppleats)
                        ->orwhere('strSegPatternID', '=', $ppocket)
                        ->orwhere('strSegPatternID', '=', $pbottom)
                        ->get();

                $pstylePrice = 0.00;
                
                for($i = 0; $i < count($pstyles); $i++)
                {
                    $pstylePrice += $pstyles[$i]->dblPatternPrice;
                }

                $plinetotal = 0.00;

                $plinetotal = $pstylePrice + $pprice + $pfprice;

                $ptotal = $pqty * $plinetotal;

                $mtotal = $mqty * $mlinetotal;

                $grand = $mtotal + $ptotal;
                $totalqty = $mqty + $pqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

             


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('mname', $mname)
                    ->with('pname', $pname)
                    ->with('mprice', $mprice)
                    ->with('pprice', $pprice)
                    ->with('mfname', $mfname)
                    ->with('mfprice', $mfprice)
                    ->with('mname', $mname)
                    ->with('mprice', $mprice)
                    ->with('pfname', $pfname)
                    ->with('pfprice', $pfprice)
                    ->with('mqty', $mqty)
                    ->with('pqty', $pqty)
                    ->with('mstyles', $mstyles)
                    ->with('pstyles', $pstyles)
                    ->with('mlinetotal', $mlinetotal)
                    ->with('plinetotal', $plinetotal)
                    ->with('mtotal', $mtotal)
                    ->with('ptotal', $ptotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }

        else if ($men == null && $women != null && $pants != null)
        {
            
            $msegment = 1;
            $wsegment = 0;
            $psegment = 1;

            $wstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $wpocket)
                        ->orwhere('strSegPatternID', '=', $wcollar)
                        ->orwhere('strSegPatternID', '=', $wcuff)
                        ->orwhere('strSegPatternID', '=', $wsleeve)
                        ->get();

                $wstylePrice = 0.00;
                
                for($i = 0; $i < count($wstyles); $i++)
                {
                    $wstylePrice += $wstyles[$i]->dblPatternPrice;
                }

                $wlinetotal = 0.00;
                $wlinetotal = $wstylePrice + $wprice + $wfprice;

                $wtotal = $wqty * $wlinetotal;

                $pstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $ppleats)
                        ->orwhere('strSegPatternID', '=', $ppocket)
                        ->orwhere('strSegPatternID', '=', $pbottom)
                        ->get();

                $pstylePrice = 0.00;
                
                for($i = 0; $i < count($pstyles); $i++)
                {
                    $pstylePrice += $pstyles[$i]->dblPatternPrice;
                }

                $plinetotal = 0.00;

                $plinetotal = $pstylePrice + $pprice + $pfprice;

                $ptotal = $pqty * $plinetotal;

                $wtotal = $wqty * $wlinetotal;

                $grand = $wtotal + $ptotal;
                $totalqty = $wqty + $pqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

             


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('wname', $wname)
                    ->with('pname', $pname)
                    ->with('wprice', $wprice)
                    ->with('pprice', $pprice)
                    ->with('wfname', $wfname)
                    ->with('wfprice', $wfprice)
                    ->with('wname', $wname)
                    ->with('wprice', $wprice)
                    ->with('pfname', $pfname)
                    ->with('pfprice', $pfprice)
                    ->with('wqty', $wqty)
                    ->with('pqty', $pqty)
                    ->with('wstyles', $wstyles)
                    ->with('pstyles', $pstyles)
                    ->with('wlinetotal', $wlinetotal)
                    ->with('plinetotal', $plinetotal)
                    ->with('wtotal', $wtotal)
                    ->with('ptotal', $ptotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }

        else if ($men != null && $women != null && $pants != null)
        {
            
            $msegment = 1;
            $wsegment = 1;
            $psegment = 1;
               

            
            $mstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $mcollar)
                        ->orwhere('strSegPatternID', '=', $mpocket)
                        ->get();

                $mstylePrice = 0.00;
                
                for($i = 0; $i < count($mstyles); $i++)
                {
                    $mstylePrice += $mstyles[$i]->dblPatternPrice;
                }

                $mlinetotal = 0.00;
                $mlinetotal = $mstylePrice + $mprice + $mfprice;

                $mtotal = $mqty * $mlinetotal;


            $wstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $wpocket)
                        ->orwhere('strSegPatternID', '=', $wcollar)
                        ->orwhere('strSegPatternID', '=', $wcuff)
                        ->orwhere('strSegPatternID', '=', $wsleeve)
                        ->get();

                $wstylePrice = 0.00;
                
                for($i = 0; $i < count($wstyles); $i++)
                {
                    $wstylePrice += $wstyles[$i]->dblPatternPrice;
                }

                $wlinetotal = 0.00;
                $wlinetotal = $wstylePrice + $wprice + $wfprice;

                $wtotal = $wqty * $wlinetotal;

                $pstyles = \DB::table('tblSegmentPattern')
                        ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $ppleats)
                        ->orwhere('strSegPatternID', '=', $ppocket)
                        ->orwhere('strSegPatternID', '=', $pbottom)
                        ->get();

                $pstylePrice = 0.00;
                
                for($i = 0; $i < count($pstyles); $i++)
                {
                    $pstylePrice += $pstyles[$i]->dblPatternPrice;
                }

                $plinetotal = 0.00;

                $plinetotal = $pstylePrice + $pprice + $pfprice;

                $ptotal = $pqty * $plinetotal;

                $wtotal = $wqty * $wlinetotal;

                $grand = $wtotal + $ptotal + $mtotal;

                $totalqty = $wqty + $pqty + $mqty;

                session(['grand' => $grand]);
                session(['totalqty' => $totalqty]);

                $vat_total = ($grand * (int)$vat)/100;

                $estimated = $grand - $vat_total;

             


                return view('online.individual-checkout-payment')
                    ->with('joID', $joID)
                    ->with('mname', $mname)
                    ->with('wname', $wname)
                    ->with('pname', $pname)
                    ->with('mprice', $mprice)
                    ->with('wprice', $wprice)
                    ->with('pprice', $pprice)
                    ->with('mfname', $mfname)
                    ->with('mfprice', $mfprice)
                    ->with('mprice', $wprice)
                    ->with('wfname', $wfname)
                    ->with('wfprice', $wfprice)
                    ->with('wprice', $wprice)
                    ->with('pfname', $pfname)
                    ->with('pfprice', $pfprice)
                    ->with('mqty', $mqty)
                    ->with('wqty', $wqty)
                    ->with('pqty', $pqty)
                    ->with('mstyles', $mstyles)
                    ->with('wstyles', $wstyles)
                    ->with('pstyles', $pstyles)
                    ->with('mlinetotal', $mlinetotal)
                    ->with('wlinetotal', $wlinetotal)
                    ->with('plinetotal', $plinetotal)
                    ->with('mtotal', $mtotal)
                    ->with('wtotal', $wtotal)
                    ->with('ptotal', $ptotal)
                    ->with('grand', $grand)
                    ->with('vat_total', $vat_total)
                    ->with('vat', $vat)
                    ->with('estimated', $estimated)
                    ->with('msegment', $msegment)
                    ->with('wsegment', $wsegment)
                    ->with('psegment', $psegment);
        }




    }


    public function saveOrder(Request $request)
    {
        $men = '';
        $women = '';
        $suits = '';
        $pants = '';

        $mestDays = 0;
        $westDays = 0;
        $pestDays = 0;

        $orderDate = Carbon::now();

        $joID = session()->get('joID');

        $custID = session()->get('custID');



        $men = session()->get('mid');

        $mfabric = session()->get('mfid');

        $mqty = session()->get('mqty');

        $mdays = session()->get('mdays');

        $mestDays = $mqty * $mdays;

        $mpocket = session()->get('mpocket');

        $mcollar = session()->get('mcollar');



        $women = session()->get('wid');

        $wfabric = session()->get('wfid');

        $wqty = session()->get('wqty');

        $wdays = session()->get('wdays');

        $westDays = $wqty * $wdays;

        $wpocket  = session()->get('wpocket');

        $wcollar  = session()->get('wcollar');

        $wsleeve  = session()->get('wsleeve');

        $wcuff = session()->get('wcuff'); 
        
        $suits = session()->get('suitsegment_data');

       

        $pants = session()->get('pid');

        $pfabric = session()->get('pfid');

        $pqty = session()->get('pqty');

        $pdays = session()->get('pdays');

        $pestDays = $pqty * $pdays;

        $ppocket = session()->get('ppocket');

        $ppleats = session()->get('ppleats');

        $pbottom = session()->get('pbottom');



        $dtOrderExpect = Carbon::now()->addDay($mestDays + $westDays + $pestDays);

        $dtDelivery = Carbon::now()->addDay($mestDays + $westDays + $pestDays + 2);

        $mode = 'CASH';

        session(['termsOfPayment' => 'Full payment']);

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
                'boolIsOrderAccepted' => 0,
                'dtOrderDate' => $orderDate,
                'dtOrderExpectedToBeDone' => $dtOrderExpect,
                'dtExpectedDeliveryDate' => $dtDelivery,
                'boolIsActive' => 1,
                'boolIsOnline' => 1
                
            ));

            $jobOrder->save();

        if($men != null && $women == null && $pants == null)
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

        else if($men == null && $women != null && $pants == null)
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
                            'strJOSegmentFK' => $women,
                            'strJOFabricFK' => $wfabric,
                            'intQuantity' => $wqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $westDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
            //}
                            
            $jobOrderSpecifics->save();

             $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                        ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                        ->where('strSegPatternID', '=', $wpocket)
                        ->orwhere('strSegPatternID', '=', $wcollar)
                        ->orwhere('strSegPatternID', '=', $wcuff)
                        ->orwhere('strSegPatternID', '=', $wsleeve)
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

        else if($men == null && $women == null && $pants != null)
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
                            'strJOSegmentFK' => $pants,
                            'strJOFabricFK' => $pfabric,
                            'intQuantity' => $pqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $mestDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
            //}
                            
            $jobOrderSpecifics->save();

             $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $ppleats)
                    ->orwhere('strSegPatternID', '=', $ppocket)
                    ->orwhere('strSegPatternID', '=', $pbottom)
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

        elseif($men != null && $women != null && $pants == null)
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
                            'strJOSegmentFK' => $women,
                            'strJOFabricFK' => $wfabric,
                            'intQuantity' => $wqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $westDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
             
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $wpocket)
                    ->orwhere('strSegPatternID', '=', $wcollar)
                    ->orwhere('strSegPatternID', '=', $wcuff)
                    ->orwhere('strSegPatternID', '=', $wsleeve)
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

        elseif($men != null && $women == null && $pants != null)
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
                            'strJOSegmentFK' => $pants,
                            'strJOFabricFK' => $pfabric,
                            'intQuantity' => $pqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $pestDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
             
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $ppleats)
                    ->orwhere('strSegPatternID', '=', $ppocket)
                    ->orwhere('strSegPatternID', '=', $pbottom)
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


        elseif($men == null && $women != null && $pants != null)
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
                            'strJOSegmentFK' => $women,
                            'strJOFabricFK' => $wfabric,
                            'intQuantity' => $wqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $westDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
            //}
                    //dd($jobSpecsID);    
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $wpocket)
                    ->orwhere('strSegPatternID', '=', $wcollar)
                    ->orwhere('strSegPatternID', '=', $wcuff)
                    ->orwhere('strSegPatternID', '=', $wsleeve)
                    ->get();

                  for($i = 0; $i < count($styles); $i++)
                    {
                        
                        
                         $jobOrderSpecificsPattern = TransactionJobOrderSpecificsPattern::create(array(
                            'strJobOrderSpecificFK' => $jobSpecsID,
                            'strSegmentPatternFK' => $styles[$i]->strSegPatternID
                        ));  
                         

                        $jobOrderSpecificsPattern->save();

                    }

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
                            'strJOSegmentFK' => $pants,
                            'strJOFabricFK' => $pfabric,
                            'intQuantity' => $pqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $pestDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
             
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $ppleats)
                    ->orwhere('strSegPatternID', '=', $ppocket)
                    ->orwhere('strSegPatternID', '=', $pbottom)
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

        elseif($men != null && $women != null && $pants != null)
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
                            'strJOSegmentFK' => $women,
                            'strJOFabricFK' => $wfabric,
                            'intQuantity' => $wqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $westDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
            //}
                    //dd($jobSpecsID);    
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $wpocket)
                    ->orwhere('strSegPatternID', '=', $wcollar)
                    ->orwhere('strSegPatternID', '=', $wcuff)
                    ->orwhere('strSegPatternID', '=', $wsleeve)
                    ->get();

                  for($i = 0; $i < count($styles); $i++)
                    {
                        
                        
                         $jobOrderSpecificsPattern = TransactionJobOrderSpecificsPattern::create(array(
                            'strJobOrderSpecificFK' => $jobSpecsID,
                            'strSegmentPatternFK' => $styles[$i]->strSegPatternID
                        ));  
                         

                        $jobOrderSpecificsPattern->save();

                    }

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
                            'strJOSegmentFK' => $pants,
                            'strJOFabricFK' => $pfabric,
                            'intQuantity' => $pqty,
                            'dblUnitPrice' => $grand,
                            'intEstimatedDaysToFinish' => $pestDays,
                            'strEmployeeNameFK' => 'EMPL001',
                            'boolIsActive' => 1
                    ));
             
            $jobOrderSpecifics->save();

            $styles = \DB::table('tblSegmentPattern')
                    ->leftjoin('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                    ->select('tblSegmentPattern.*', 'tblSegmentStyleCategory.*')
                    ->where('strSegPatternID', '=', $ppleats)
                    ->orwhere('strSegPatternID', '=', $ppocket)
                    ->orwhere('strSegPatternID', '=', $pbottom)
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



            \Session::flash('flash_message','Order successfully sent. Wait for email confirmation.'); //flash message

    return redirect('clear-values');
    }

    public function clearValues(Request $request)
    {
        session()->forget('joID');

        session()->forget('custID');

        session()->forget('mid');

        session()->forget('pid');

        session()->forget('mfid');

        session()->forget('mqty');

        session()->forget('mdays');

        session()->forget('mpocket');

        session()->forget('mcollar');

        session()->forget('wid');

        session()->forget('wfid');

        session()->forget('wqty');

        session()->forget('wdays');

        session()->forget('wcuff');
        
        session()->forget('suitsegment_data');

        session()->forget('pantssegment_data');

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
