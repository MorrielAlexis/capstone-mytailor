<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MeasurementDetail;
use App\Http\Requests;
use App\Http\Requests\MaintenanceMeasDetailRequest;
use App\Http\Controllers\Controller;

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
        $detailNewID = $this->smartCounter($ID);            

        $detail = MeasurementDetail::all();
        
        
        //load the view and pass the individuals
        return view('maintenance-measurement-detail')
                    ->with('detail', $detail)
                    ->with('detailNewID', $detailNewID);
    }


    public function store(MaintenanceMeasDetailRequest $request)
    {

             $det = MeasurementDetail::get();
    
                $detail = MeasurementDetail::create(array(
                'strMeasurementDetailID' =>$request->input('strMeasurementDetailID'),
                'strMeasurementDetailName' =>trim($request->input('strMeasurementDetailName')),
                'txtMeasurementDetailDesc' =>trim($request->input('txtMeasurementDetailDesc')),
                'boolIsActive' => 1
                ));

            $detail->save();

        
         \Session::flash('flash_message','Measurement part successfully added.'); //flash message

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

                $detail->strMeasurementDetailName = trim($request->input('editDetailName'));   
                $detail->txtMeasurementDetailDesc = trim($request->input('editDetailDesc'));

        $detail->save();

        \Session::flash('flash_message_update','Measurement part successfully updated.'); //flash message

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
