<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SegmentPattern;
use App\GarmentCategory;
use App\GarmentSegment;
use App\SegmentStyle;
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

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

        $segmentStyle = SegmentStyle::all();

        // $pattern = SegmentPattern::all();

        $pattern = \DB::table('tblSegmentPattern')
                ->join('tblSegmentStyleCategory', 'tblSegmentPattern.strSegPStyleCategoryFK', '=', 'tblSegmentStyleCategory.strSegStyleCatID')
                ->select('tblSegmentPattern.*','tblSegmentStyleCategory.strSegStyleName') 
                ->orderBy('strSegPatternID')
                ->get();
        
        //load the view and pass the pattern
        return view('maintenance-segment-pattern')
                    ->with('pattern', $pattern)
                    ->with('segmentStyle', $segmentStyle)
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
                'strSegPatternID' => $request->input('strSegPatternID'),
                'strSegPStyleCategoryFK' => $request->input('strSegPStyleCategoryFK'),
                'strSegPName' => trim($request->input('strSegPName')),
                'dblPatternPrice' => trim($request->input('dblPatternPrice')),
                'txtSegPDesc' => trim($request->input('txtSegPDesc')),
                'boolIsActive' => 1
                ));     
                }else{
                    $request->file('addImg')->move($destinationPath, $file);

                    $pattern = SegmentPattern::create(array(
                        'strSegPatternID' => $request->input('strSegPatternID'),
    
                        'strSegPStyleCategoryFK' => $request->input('strSegPStyleCategoryFK'),
                        'strSegPName' => trim($request->input('strSegPName')),
                        'dblPatternPrice' => trim($request->input('dblPatternPrice')),
                        'txtSegPDesc' => trim($request->input('txtSegPDesc')),
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

    function update_segmentpattern(Request $request)
    {
        $pattern = SegmentPattern::find($request->input('editPatternID'));

        $checkPatterns = SegmentPattern::all();

        $file = $request->input('editImage');
        $destinationPath = 'imgDesignPatterns';
        $isAdded = FALSE;

        foreach ($checkPatterns as $checkPattern)
            if(!strcasecmp($checkPattern->strSegPatternID, $request->input('editPatternID')) == 0 &&
                strcasecmp($checkPattern->strSegPStyleCategoryFK, $request->input('editSegmentStyle')) == 0 &&
                strcasecmp($checkPattern->strSegPName, trim($request->input('editPatternName'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){

                if($file == $pattern->strSegPImage)
                {
                    $pattern->strSegPStyleCategoryFK = $request->input('editSegmentStyle');
                    $pattern->strSegPName = trim($request->input('editPatternName'));
                    $pattern->dblPatternPrice = trim($request->input('editPatternPrice'));
                    $pattern->strSegPDesc = trim($request->input('editSegPDesc'));

                }else{

                    $request->file('editImg')->move($destinationPath);
                    $pattern->strSegPStyleCategoryFK = $request->input('editSegmentStyle');
                    $pattern->strSegPName = trim($request->input('editPatternName'));
                    $pattern->dblPatternPrice = trim($request->input('editPatternPrice'));
                    $pattern->txtSegPDesc = trim($request->input('editSegPDesc'));
                    $pattern->strSegPImage = 'imgDesignPatterns/'.$file;
                }           

                $pattern->save();

            \Session::flash('flash_message_update','Segment pattern detail/s successfully updated.'); //flash message   

            }else \Session::flash('flash_message_duplicate','Segment pattern already exists.'); //flash message   

            
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
