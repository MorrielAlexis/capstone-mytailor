<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SegmentPattern;
use App\GarmentCategory;
use App\GarmentSegment;
use App\Http\Requests;
use App\Http\Requests\SegmentPatternRequest;
use App\Http\Controllers\Controller;

class SegmentPatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the segment pattern

        $ids = \DB::table('tblSegmentPattern')
            ->select('strSegPatternID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strSegPatternID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strSegPatternID;
        $newID = $this->smartCounter($ID);  

        $category = GarmentCategory::all();

        $segment = GarmentSegment::all();

        // $pattern = SegmentPattern::all();

        $pattern = \DB::table('tblSegmentPattern')
                ->join('tblGarmentCategory', 'tblSegmentPattern.strSegPCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                ->join('tblSegment', 'tblSegmentPattern.strSegPNameFK', '=', 'tblSegment.strSegmentID')
                ->select('tblSegmentPattern.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblSegment.strSegmentName') 
                ->orderBy('strSegPatternID')
                ->get();
        
        //load the view and pass the pattern
        return view('maintenance-segment-pattern')
                    ->with('pattern', $pattern)
                    ->with('category', $category)
                    ->with('segment', $segment)
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
    public function store(SegmentPatternRequest $request)
    {
        $file = $request->input('addImage');
        $destinationPath = 'imgDesignPatterns';

            if($file == '' || $file == null){
                $pattern = SegmentPattern::create(array(
                'strSegPatternID' => $request->input('addPatternID'),
                'strSegPCategoryFK' => $request->input('addCategory'),
                'strSegPNameFK' => $request->input('addSegment'),
                'strSegPName' => trim($request->input('addPatternName')),
                'boolIsActive' => 1
                ));     
                }else{
                    $request->file('addImg')->move($destinationPath, $file);

                    $pattern = SegmentPattern::create(array(
                        'strSegPatternID' => $request->input('addPatternID'),
                        'strSegPCategoryFK' => $request->input('addCategory'),
                        'strSegPNameFK' => $request->input('addSegment'),
                        'strSegPName' => trim($request->input('addPatternName')),
                        'strSegPImage' => 'imgDesignPatterns/'.$file,
                        'boolIsActive' => 1
                    )); 
                }

            // $pattern->save();
                 $added = $pattern->save();


             \Session::flash('flash_message','Segment pattern successfully added.'); //flash message
            
            return redirect('/maintenance/segment-pattern');

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

    function update_segmentpattern(SegmentPatternRequest $request)
    {

        $pattern = SegmentPattern::find($request->input('editPatternID'));

        $file = $request->input('editImage');
        $destinationPath = 'imgDesignPatterns';

                if($file == $pattern->strSegPImage)
                {
                    $pattern->strSegPCategoryFK = $request->input('editCategory');
                    $pattern->strSegPNameFK = $request->input('editSegment');
                    $pattern->strSegPName = trim($request->input('editPatternName'));
                }else{
                    $request->file('editImg')->move($destinationPath);

                    $pattern->strSegPCategoryFK = $request->input('editCategory');
                    $pattern->strSegPNameFK = $request->input('editSegment');
                    $pattern->strSegPName = trim($request->input('editPatternName'));
                    $pattern->strSegPImage = 'imgDesignPatterns/'.$file;
                }           

                $pattern->save();

            \Session::flash('flash_message_update','Segment pattern detail/s successfully updated.'); //flash message      

            
            return redirect('maintenance/segment-pattern');
               

    }


    function delete_segmentpattern(Request $request)
    {

        $pattern = SegmentPattern::find($request->input('delPatternID'));

        $pattern->strSegPInactiveReason = trim($request->input('delInactivePattern'));
        $pattern->boolIsActive = 0;
        $pattern->save();


       \Session::flash('flash_message_delete','Segment pattern successfully deactivated.'); //flash message

        return redirect('maintenance/segment-pattern');
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
