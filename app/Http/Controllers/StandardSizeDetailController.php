<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\StandardSizeCategory;
use App\StandardSizeDetail;
use App\MeasurementCategory;
use App\GarmentSegment;


class StandardSizeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = \DB::table('tblStandardSizeDetail')
            ->select('strStandardSizeDetID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strStandardSizeDetID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strStandardSizeDetID;
        $newID = $this->smartCounter($ID);  
        $standard = StandardSizeCategory::all();
        $measurementCategory = MeasurementCategory::all();
        $segment = GarmentSegment::all();
           

        $standardDetail = \DB::table('tblStandardSizeDetail')
            ->join('tblSegment', 'tblStandardSizeDetail.strStanSizeSegmentFK', '=', 'tblSegment.strSegmentID')
            ->join('tblMeasurementCategory', 'tblStandardSizeDetail.strStanSizeMeasCatFK', '=', 'tblMeasurementCategory.strMeasurementCategoryID')
            ->join('tblStandardSizeCategory', 'tblStandardSizeDetail.strStanSizeCategoryFK', '=', 'tblStandardSizeCategory.strStandardSizeCategoryID')
            ->select('tblStandardSizeDetail.*', 'tblSegment.strSegmentName', 'tblMeasurementCategory.strMeasurementCategoryName', 'tblStandardSizeCategory.strStandardSizeCategoryName')
            ->orderBy('strStandardSizeDetID')
            ->get();

       return view('maintenance-measurement-standard-size-detail')
                    ->with('standard', $standard)
                    ->with('measurementCategory', $measurementCategory)
                    ->with('segment', $segment)
                    ->with('standardDetail', $standardDetail)
                    ->with('newID', $newID);
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
        $standardDet = StandardSizeDetail::get();

        $standardDetail = StandardSizeDetail::create(array(
                    'strStandardSizeDetID' => $request->input('strStandardSizeDetID'),
                    'strStanSizeSegmentFK' => $request->input('strStanSizeSegmentFK'),     
                    'strStanSizeMeasCatFK' => $request->input('strStanSizeMeasCatFK'),
                    'strStanSizeCategoryFK' => $request->input('strStanSizeCategoryFK'),
                    'strStanSizeDetailName' => trim($request->input('strStanSizeDetailName')), 
                    'strStanSizeFitType' => trim($request->input('strStanSizeFitType')),
                    'dblStanSizeInch' => trim($request->input('dblStanSizeInch')),   
                    'dblStanSizeCm' => trim($request->input('dblStanSizeCm')),   
                    'txtStanSizeDesc' => trim($request->input('txtStanSizeDesc')),
                    'boolIsActive' => 1
                    ));

                $standardDetail->save();

         \Session::flash('flash_message','Standard size detail successfully added.');

        return redirect('maintenance/standard-size-detail');
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
