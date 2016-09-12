<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BodyPartCategory;
use App\BodyPartForm;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BodyPartFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ids = \DB::table('tblBodyPartForm')
            ->select('strBodyFormID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strBodyFormID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strBodyFormID;
        $newID = $this->smartCounter($ID);  

        $bodyPartCategory = BodyPartCategory::all();


        $bodyForm = \DB::table('tblBodyPartForm')
                ->join('tblBodyPartCategory', 'tblBodyPartForm.strBodyPartFK', '=', 'tblBodyPartCategory.strBodyPartCategoryID')
                ->select('tblBodyPartForm.*','tblBodyPartCategory.strBodyPartCatName') 
                ->orderBy('strBodyFormID')
                ->get();
        
        //load the view and pass the pattern
       return view('maintenance.maintenance-measurement-body-part-form')
                    ->with('bodyPartCategory', $bodyPartCategory)
                    ->with('bodyForm', $bodyForm)
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
        $file = $request->input('addImage');
        $destinationPath = 'imgBodyForms';

            if($file == '' || $file == null){
                $bodyForm = BodyPartForm::create(array(

                        'strBodyFormID' => $request->input('strBodyFormID'),
                        'strBodyPartFK' =>$request->input('strBodyPartFK'),
                        'strBodyFormName' =>trim($request->input('strBodyFormName')),
                        'txtBodyFormDesc' =>trim($request->input('txtBodyFormDesc')),
                        'boolIsActive' => 1

                ));
            }else{

                $request->file('addImg')->move($destinationPath);
                $bodyForm = BodyPartForm::create(array(

                        'strBodyFormID' => $request->input('strBodyFormID'),
                        'strBodyPartFK' =>$request->input('strBodyPartFK'),
                        'strBodyFormName' =>trim($request->input('strBodyFormName')),
                        'txtBodyFormDesc' =>trim($request->input('txtBodyFormDesc')),
                        'strBodyFormImage' => 'imgBodyForms/'.$file,
                        'boolIsActive' => 1

                ));
            } 

                 // $added=$segment->save();
            $bodyForm->save();

            \Session::flash('flash_message','Body form successfully added.'); //flash message

        return redirect('maintenance/body-part-form');  
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

    function update_bodyPartForm(Request $request)
    {   
        $bodyForm = BodyPartForm::find($request->input('editBodyFormID'));
        $checkForms = BodyPartForm::all();

        $file = $request->input('editImage');
        $destinationPath = 'imgBodyForms';
        $isAdded = FALSE;

        foreach ($checkForms as $checkForm)
            if(!strcasecmp($checkForm->strBodyFormID, $request->input('editBodyFormID')) == 0 &&
               strcasecmp($checkForm->strBodyFormName, trim($request->input('editBodyFormName'))) == 0 && 
               strcasecmp($checkForm->strBodyPartFK, $request->input('editPartCategory')) == 0)
                $isAdded = TRUE;

        if(!$isAdded){
            if($file == $bodyForm->strBodyFormImage)
            {

                $bodyForm->strBodyPartFK = $request->input('editPartCategory'); 
                $bodyForm->strBodyFormName = trim($request->input('editBodyFormName'));
                $bodyForm->txtBodyFormDesc = trim($request->input('editBodyFormDesc'));
            }else{
                    $request->file('editImg')->move($destinationPath);
                    $bodyForm->strBodyPartFK = $request->input('editPartCategory'); 
                    $bodyForm->strBodyFormName = trim($request->input('editBodyFormName'));  
                    $bodyForm->txtBodyFormDesc = trim($request->input('editBodyFormDesc')); 
                    $bodyForm->strBodyFormImage = 'imgBodyForms/'.$file;
            }
                $bodyForm->save();
                
            \Session::flash('flash_message_update','Body form detail/s successfully updated.'); //flash message   
        }else \Session::flash('flash_message_duplicate','Body form  already exists.'); //flash message 

        return redirect('maintenance/body-part-form');
    }

    function delete_bodyPartForm(Request $request)
    {

       $id = $request->input('delBodyFormID');
        $bodyForm = BodyPartForm::find($request->input('delBodyFormID'));
        $bodyForm->strBodyFormInactiveReason = trim($request->input('delInactiveBodyForm')); 
        $bodyForm->boolIsActive = 0;
        $bodyForm->save();
        \Session::flash('flash_message_delete','Body form successfully deactivated.'); //flash message
                    return redirect('maintenance/body-part-form'); 
            
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
