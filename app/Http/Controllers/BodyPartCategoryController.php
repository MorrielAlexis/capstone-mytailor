<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BodyPartCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BodyPartCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = \DB::table('tblBodyPartCategory')
            ->select('strBodyPartCategoryID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strBodyPartCategoryID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strBodyPartCategoryID;
        $newID = $this->smartCounter($ID);  
        $bodyPartCategory = BodyPartCategory::all();
       
        return view('maintenance-measurement-body-cat')
                    ->with('bodyPartCategory', $bodyPartCategory)
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
          $bodyParts = BodyPartCategory::get();
            $bodyPartCategory = BodyPartCategory::create(array(
                'strBodyPartCategoryID' => $request->input('strBodyPartCategoryID'),
                'strBodyPartCatName' => trim($request->input('strBodyPartCatName')),
                'textBodyPartCatDesc' => trim($request->input('textBodyPartCatDesc')),
                'boolIsActive' => 1
                ));

         $added=$bodyPartCategory->save();
          

        \Session::flash('flash_message','Body part category successfully added.'); //flash message

        return redirect('maintenance/body-part-category');
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

    function update_bodyPartCategory(Request $request)
    {
        $checkParts = BodyPartCategory::all();
        $isAdded=FALSE;

        foreach($checkParts as $checkPart)
            if(!strcasecmp($checkPart->strBodyPartCategoryID, $request->input('editBodyPartCatID')) == 0 &&
                strcasecmp($checkPart->strBodyPartCatName, trim($request->input('editBodyPartCatName'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){
            $bodyPartCategory = BodyPartCategory::find($request->input('editBodyPartCatID'));
            $bodyPartCategory->strBodyPartCatName = trim($request->input('editBodyPartCatName'));
            $bodyPartCategory->textBodyPartCatDesc = trim($request->input('editBodyPartCatDesc'));

            $bodyPartCategory ->save();


          \Session::flash('flash_message_update','Body part category detail/s successfully updated.'); //flash message   
        }else \Session::flash('flash_message_duplicate','Body part category already exists.'); //flash message

        return  redirect('maintenance/body-part-category');

    }



    function delete_bodyPartCategory(Request $request)
    {   
        $id = $request->input('delGarmentID');
        $bodyPartCategory = BodyPartCategory::find($request->input('delBodyPartCatID'));

        $count = \DB::table('tblBodyPartForm')
                ->join('tblBodyPartCategory', 'tblBodyPartForm.strBodyPartFK', '=', 'tblBodyPartCategory.strBodyPartCategoryID')

                ->select('tblBodyPartCategory.*')

                ->where('tblBodyPartCategory.strBodyPartCategoryID','=', $id)
                ->count();
                
                if ($count != 0) {
                    return redirect('maintenance/body-part-category?success=beingUsed'); 
                }else {
                    $bodyPartCategory->strBodyPartCategoryInactiveReason = trim($request->input('delBodyPartCatID')); 
                    $bodyPartCategory->boolIsActive = 0;
                    $bodyPartCategory->save();
                    \Session::flash('flash_message_delete','Body part category successfully deactivated.'); //flash message
                    return redirect('maintenance/body-part-category'); 
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
