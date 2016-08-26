<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StandardSizeCategory;
use App\Http\Requests;
use App\Http\Requests\MaintenanceStandardSizeCategoryRequest;
use App\Http\Controllers\Controller;


class StandardSizeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = \DB::table('tblStandardSizeCategory')
            ->select('strStandardSizeCategoryID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strStandardSizeCategoryID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strStandardSizeCategoryID;
        $newID = $this->smartCounter($ID);  
        $standard = StandardSizeCategory::all();
       
        return view('maintenance-measurement-standard-cat')
                    ->with('standard', $standard)
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
    public function store(MaintenanceStandardSizeCategoryRequest $request)
    {
        $standards = StandardSizeCategory::get();

        $standard = StandardSizeCategory::create(array(
                    'strStandardSizeCategoryID' => $request->input('strStandardSizeCategoryID'),
                    'strStandardSizeCategoryName' => trim($request->input('strStandardSizeCategoryName')), 
                    'txtStandardSizeCategoryDesc' => trim($request->input('txtStandardSizeCategoryDesc')),
                    'boolIsActive' => 1
                    ));

                $standard->save();

         \Session::flash('flash_message','Standard size category successfully added.');

        return redirect('maintenance/standard-size-category');
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

    public function update_standardCategory(Request $request)
    {   
        $standard = StandardSizeCategory::find($request->input('editStandardSizeCategoryID'));
        $checkStandardCats = StandardSizeCategory::all();
        $isAdded = FALSE;

        foreach ($checkStandardCats as $checkStandardCat)
            if(!strcasecmp($checkStandardCat->strStandardSizeCategoryID, $request->input('editStandardSizeCategoryID')) == 0 &&
                strcasecmp($checkStandardCat->strStandardSizeCategoryName, trim($request->input('editStandardSizeCatName'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){
        $standard = StandardSizeCategory::find($request->input('editStandardSizeCategoryID'));

        $standard->strStandardSizeCategoryName = trim($request->input('editStandardSizeCatName'));
        $standard->txtStandardSizeCategoryDesc = trim($request->input('editStandardSizeCatDesc'));
        $standard->save();

        \Session::flash('flash_message_update','Standard size category successfully updated.'); //flash message
         }else \Session::flash('flash_message_duplicate','Standard size category already exists.'); //flash message 

        return redirect('maintenance/standard-size-category');
    }

    function delete_standardCategory(Request $request)
    {
         $id = $request->input('delStandardCatID');
         $standard = StandardSizeCategory::find($request-> input('delStandardCatID'));

          $count = \DB::table('tblStandardSizeDetail')
                ->join('tblStandardSizeCategory', 'tblStandardSizeDetail.strStanSizeCategoryFK', '=', 'tblStandardSizeCategory.strStandardSizeCategoryID')
                ->select('tblStandardSizeCategory.*')
                ->where('tblStandardSizeCategory.strStandardSizeCategoryID','=', $id)
                ->count();
          if ($count != 0 || $count2 != 0){
                    return redirect('maintenance/measurement-category?success=beingUsed'); 
                }else {

            $standard->strStandardSizeCategoryInactiveReason = trim($request->input('delInactiveStandardSizeCat'));
            $standard->boolIsActive = 0;
            $standard->save();

        \Session::flash('flash_message_delete','Standard size category successfully deactivated.');

        return redirect('maintenance/standard-size-category');
        }
        
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
