<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MeasurementDetail;
use App\Http\Requests;
use App\Http\Requests\MaintenanceMeasDetailRequest;
use App\Http\Controllers\Controller;
use App\GarmentSegment;
use App\MeasurementCategory;

class MeasurementDetailController extends Controller
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
        //get all the measurement detail
        $ids = \DB::table('tblMeasurementDetail')
            ->select('strMeasurementDetailID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strMeasurementDetailID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strMeasurementDetailID;
        $newID = $this->smartCounter($ID);            


        $segment  = GarmentSegment::all();
        $measurementCategory = MeasurementCategory::all();

        $detail =\DB::table('tblMeasurementDetail')
            ->join('tblSegment', 'tblMeasurementDetail.strMeasDetSegmentFK', '=', 'tblSegment.strSegmentID')
            ->join('tblMeasurementCategory', 'tblMeasurementDetail.strMeasCategoryFK', '=', 'tblMeasurementCategory.strMeasurementCategoryID')
            ->select('tblMeasurementDetail.*', 'tblSegment.strSegmentName', 'tblMeasurementCategory.strMeasurementCategoryName')
            ->orderBy('strMeasurementDetailID')
            ->get();
                
        //load the view and pass the individuals
        return view('maintenance.maintenance-measurement-detail')
                    ->with('detail', $detail)
                    ->with('segment', $segment)
                    ->with('measurementCategory', $measurementCategory)
                    ->with('newID', $newID);
    }


    public function store(MaintenanceMeasDetailRequest $request)
    {

            $file = $request->input('addImage');
             $destinationPath = 'imgMeasurementDetail';

                if($file == '' || $file == null){
                    $detail = MeasurementDetail::create(array(

                'strMeasurementDetailID' =>$request->input('strMeasurementDetailID'),
                'strMeasDetSegmentFK'    =>$request->input('strMeasDetSegmentFK'),
                'strMeasCategoryFK'      =>$request->input('strMeasCategoryFK'),
                'strMeasDetailName'      =>trim($request->input('strMeasDetailName')),
                'txtMeasDetailDesc'      =>trim($request->input('txtMeasDetailDesc')),
                'dblMeasDetailMinCm'     =>trim($request->input('dblMeasDetailMinCm')),
                'dblMeasDetailMinInch'   =>trim($request->input('dblMeasDetailMinInch')),
                'boolIsActive'           => 1
                
                ));
              }else{

                $request->file('addImg')->move($destinationPath, $file);

                $detail = MeasurementDetail::create(array(

                        'strMeasurementDetailID' =>$request->input('strMeasurementDetailID'),
                        'strMeasDetSegmentFK'    =>$request->input('strMeasDetSegmentFK'),
                        'strMeasCategoryFK'      =>$request->input('strMeasCategoryFK'),
                        'strMeasDetailName'      =>trim($request->input('strMeasDetailName')),
                        'txtMeasDetailDesc'      =>trim($request->input('txtMeasDetailDesc')),
                        'dblMeasDetailMinCm'     =>trim($request->input('dblMeasDetailMinCm')),
                        'dblMeasDetailMinInch'   =>trim($request->input('dblMeasDetailMinInch')),
                        'strMeaDetailImage' => 'imgMeasurementDetail/'.$file,
                        'boolIsActive' => 1

                ));
            } 



            $added=$detail->save();

        
         \Session::flash('flash_message','Measurement detail successfully added.'); //flash message

        return redirect ('maintenance/measurement-detail');


    }

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

    function update_measurementdetail(Request $request)
    {
        
        $detail = MeasurementDetail::find($request->input('editDetailID'));
        $isAdded = FALSE;
        $file = $request->input('editImage');
        $destinationPath = 'imgMeasurementDetail';
        $checkmeasurementDets = MeasurementDetail::all();


        foreach ($checkmeasurementDets as $checkmeasurementDet)
            if(!strcasecmp($checkmeasurementDet->strMeasurementDetailID, $request->input('editDetailID')) == 0 &&
                strcasecmp($checkmeasurementDet->strMeasDetSegmentFK, $request->input('editMeasSegment')) == 0 && strcasecmp($checkmeasurementDet->strMeasCategoryFK,$request->input('editMeasCategory')) == 0 && strcasecmp($checkmeasurementDet->strMeasDetailName, trim($request->input('editMeasDetailName'))) == 0);
                $isAdded = TRUE;

            if(!$isAdded){

                if($file == $detail->strMeaDetailImage)
                {

                     $detail->strMeasurementDetailID= $request->input('editDetailID');
                     $detail->strMeasDetSegmentFK   = $request->input('editMeasSegment');
                     $detail->strMeasCategoryFK     = $request->input('editMeasCategory');
                     $detail->strMeasDetailName     = trim($request->input('editMeasDetailName'));
                     $detail->txtMeasDetailDesc     = trim($request->input('editMeasDetailDesc'));
                     $detail->dblMeasDetailMinCm    = trim($request->input('editMeasDetailMinCm'));
                     $detail->dblMeasDetailMinInch  = trim($request->input('editMeasDetailMinInch'));
                }else{

                    $request->file('editImg')->move($destinationPath);

                     $detail->strMeasDetSegmentFK   = $request->input('editMeasSegment');
                     $detail->strMeasCategoryFK     = $request->input('editMeasCategory');
                     $detail->strMeasDetailName     = trim($request->input('editMeasDetailName'));
                     $detail->txtMeasDetailDesc     = trim($request->input('editMeasDetailDesc'));
                     $detail->dblMeasDetailMinCm    = trim($request->input('editMeasDetailMinCm'));
                     $detail->dblMeasDetailMinInch  = trim($request->input('editMeasDetailMinInch'));
                     $detail->strMeaDetailImage = 'imgMeasurementDetail/'. $file;
                }


        $detail->save();

        \Session::flash('flash_message_update','Measurement detail successfully updated.'); //flash message
             }else \Session::flash('flash_message_work','Measurement detail already exists.'); //flash message 

        return redirect('maintenance/measurement-detail');

    }


    function delete_measurementdetail(Request $request)
    {

        $detail = MeasurementDetail::find($request->input('delDetailID'));

        $detail->strMeasDetInactiveReason = trim($request->input('delInactiveDetail'));
        $detail->boolIsActive = 0;
        $detail-> save();

        \Session::flash('flash_message_delete','Measurement part successfully deactivated.'); //flash message

        return redirect('maintenance/measurement-detail');
            
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
