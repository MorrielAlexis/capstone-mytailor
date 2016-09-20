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
        $mendata_segment = $request->input('menshirt');
        session(['mensegment_data' => $mendata_segment]);
       

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
         $data_segment = session()->get('segment_data');

         dd($data_segment);

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

    public function menstylecuffs()
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

    public function menstylepocketmonogram()
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

    public function tocart()
    {
        $men= '';
        $women = '';

        $men = session()->get('mensegment_data');

        $women = session()->get('womensegment_data');


        GarmentCategory::all();

         $selected = \DB::table('tblSegment')
                    ->select('tblSegment.*')
                    ->where('strSegmentID', '=', $men)
                    ->orwhere('strSegmentID', '=' ,$women)
                    ->get();

        return view('online.ordernow')
            ->with('selecteds',$selected);
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
                    ->with('custID', $custID)
                    ->with('joID', $newID);

    }

    public function addCustomer(Request $request)
    {   //dd($request->input('strIndivSex'));

        $individual = Individual::create(array(
                    'strIndivID' =>  session()->get('joID'),
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

    public function payment()
    {
        $men = session()->get('mensegment_data');

        $women = session()->get('womensegment_data');

        return view('online.individual-checkout-payment');
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
