<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GarmentCategory;
use App\Http\Requests;
use App\Http\Requests\GarmentCategoryRequest;

use App\Http\Controllers\Controller;

class GarmentCategoryController extends Controller
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
         //get all the garment categories
        $ids = \DB::table('tblGarmentCategory')
            ->select('strGarmentCategoryID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strGarmentCategoryID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strGarmentCategoryID;
        $newID = $this->smartCounter($ID);  
        $garment = GarmentCategory::all();
       
        //load the view and pass the individuals
        return view('maintenance-garment-category')
                    ->with('garment', $garment)
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
    public function store(GarmentCategoryRequest $request)
    {
        $garms = GarmentCategory::get();
            $garment = GarmentCategory::create(array(
                'strGarmentCategoryID' => $request->input('strGarmentCategoryID'),
                'strGarmentCategoryName' => trim($request->input('strGarmentCategoryName')),
                'textGarmentCategoryDesc' => trim($request->input('textGarmentCategoryDesc')),
                'boolIsActive' => 1
                ));

         $added=$garment->save();
          

        \Session::flash('flash_message','Garment category successfully added.'); //flash message

        return redirect('maintenance/garment-category');
           
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

    function updateGarmentCategory(Request $request)
    {
        $checkGarments = GarmentCategory::all();
        $isAdded=FALSE;

        foreach($checkGarments as $checkGarment)
            if(!strcasecmp($checkGarment->strGarmentCategoryID, $request->input('editGarmentID')) == 0 &&
                strcasecmp($checkGarment->strGarmentCategoryName, trim($request->input('editGarmentName'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){
            $garment = GarmentCategory::find($request->input('editGarmentID'));
            $garment->strGarmentCategoryName = trim($request->input('editGarmentName'));
            $garment->textGarmentCategoryDesc = trim($request->input('editGarmentDescription'));
            // $garment = GarmentCategory::find($request->input('strGarmentCategoryID'));
            // $garment->strGarmentCategoryName = trim($request->input('strGarmentCategoryName'));
            // $garment->textGarmentCategoryDesc = trim($request->input('textGarmentCategoryDesc'));

            $garment ->save();

          \Session::flash('flash_message_update','Garment category detail/s successfully updated.'); //flash message   
        }else \Session::flash('flash_message_duplicate','Garment category already exists.'); //flash message

        return  redirect('maintenance/garment-category');
    }


    function deleteGarmentCategory(Request $request)
    {   
        $id = $request->input('delGarmentID');
        $garment = GarmentCategory::find($request->input('delGarmentID'));

        $count = \DB::table('tblSegment')
                ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                ->select('tblGarmentCategory.*')
                ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
                ->count();

        // $count2 = \DB::table('tblMeasurementCategory')
        //         ->join('tblGarmentCategory', 'tblMeasurementCategory.strMeasGarFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
        //         ->select('tblGarmentCategory.*')
        //         ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
        //         ->count();
        //         // dd($count2);

        // $count3 = \DB::table('tblSegmentPattern')
        //         ->join('tblGarmentCategory', 'tblSegmentPattern.strSegPCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
        //         ->select('tblGarmentCategory.*')
        //         ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
        //         ->count();

        $count4 = \DB::table('tblCatalogue')
                ->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                ->select('tblGarmentCategory.*')
                ->where('tblGarmentCategory.strGarmentCategoryID','=', $id)
                ->count();
                
                if ($count != 0 || $count4 != 0 ) {
                    return redirect('maintenance/garment-category?success=beingUsed'); 
                }else {
                    $garment->strGarmentCategoryInactiveReason = trim($request->input('delInactiveGarment')); 
                    $garment->boolIsActive = 0;
                    $garment->save();
                    \Session::flash('flash_message_delete','Garment category successfully deactivated.'); //flash message
                    return redirect('maintenance/garment-category'); 
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

