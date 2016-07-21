<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MeasurementCategory;

use App\Http\Requests;
use App\Http\Requests\MaintenanceMeasCategoryRequest;
use App\Http\Controllers\Controller;

class MeasurementCategoryController extends Controller
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
        //get all the category
        $ids = \DB::table('tblMeasurementCategory')
            ->select('strMeasurementCategoryID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strMeasurementCategoryID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strMeasurementCategoryID;
        $newID = $this->smartCounter($ID);

        $measurementCategory = MeasurementCategory::all();

        //load the view and pass the employees
        return view('maintenance-measurement-category')
                    ->with('measurement_categories', $measurementCategory)
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
    public function store(MaintenanceMeasCategoryRequest $request)
    {   
        $meas_category = MeasurementCategory::create(array(
                'strMeasurementCategoryID' => $request->input('strMeasurementCategoryID'),
                'strMeasurementCategoryName' => $request->input('strMeasurementCategoryName'),
                'txtMeasurementCategoryDesc' => $request->input('txtMeasurementCategoryDesc'),
                'strMeasCatInactiveReason' => null,
                'boolIsActive' => 1
            ));

        $meas_category->save();

        \Session::flash('flash_message','Measurement category successfully added.'); //flash message

        return redirect('maintenance/measurement-category');
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

    public function updateMeasurementCategory(Request $request)
    {   
        $measurementCategory = MeasurementCategory::find($request->input('editMeasurementCategoryID'));

        $measurementCategory->strMeasurementCategoryName = trim($request->input('editMeasurementCategoryName'));
        $measurementCategory->strMeasurementCategoryID = trim($request->input('editMeasurementCategoryDescription'));
        $measurementCategory->save();

        \Session::flash('flash_message_update','Measurement category successfully edited.'); //flash message

        return redirect('maintenance/measurement-category');
    }

    public function deleteMeasurementCategory(Request $request)
    {
        $meas_category = MeasurementCategory::find($request->input('delMeasurementID'));

        $meas_category->strMeasCatInactiveReason = trim($request->input('delInactiveHead'));
        $meas_category->boolIsActive = 0;
        $meas_category->save();

        \Session::flash('flash_message_update','Measurement category successfully deactivated.'); //flash message

        return redirect('maintenance/measurement-category');
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
