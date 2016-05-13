<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SegmentPattern;
use App\GarmentCategory;
use App\GarmentSegment;
use App\Http\Requests;
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
    public function store(Request $request)
    {
        // $file = $request->input('addImage');
        // $destinationPath = 'public/imgDesignPatterns';

        // $pat = SegmentPattern::get();
        // $isAdded = FALSE;
        // $validInput = TRUE;

        // $regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
        
        // if(!trim(Input::get('addPatternName')) == ''){
        //     $validInput = TRUE;
        //     if (preg_match($regex, Input::get('addPatternName'))) {
        //         $validInput = TRUE;
        //     }else $validInput = FALSE;
        // }else $validInput = FALSE;


        // foreach ($pat as $pat) 
        //     if(strcasecmp($pat->strDesignCategory, Input::get('addCategory')) == 0 && 
        //        strcasecmp($pat->strDesignSegmentName, Input::get('addSegment')) == 0 && 
        //        strcasecmp($pat->strPatternName, trim(Input::get('addPatternName'))) == 0)
        //         $isAdded = TRUE;


        // if($validInput){
        //     if(!$isAdded){
        //         if($file == '' || $file == null){
        //         $pattern = SegmentPattern::create(array(
        //         'strSegPatternID' => Input::get('addPatternID'),
        //         'strSegPCategoryFK' => Input::get('addCategory'),
        //         'strSegPNameFK' => Input::get('addSegment'),
        //         'strSegPName' => trim(Input::get('addPatternName')),
        //         'boolIsActive' => 1
        //         ));     
        //         }else{
        //             $extension = Input::file('addImg')->getClientOriginalExtension();
        //             $fileName = $file;
        //             Input::file('addImg')->move($destinationPath, $fileName);

        //             $pattern = SegmentPattern::create(array(
        //             'strSegPatternID' => Input::get('addPatternID'),
        //             'strSegPCategoryFK' => Input::get('addCategory'),
        //             'strSegPNameFK' => Input::get('addSegment'),
        //             'strSegPName' => trim(Input::get('addPatternName')),
        //             'strSegPImage' => 'imgDesignPatterns/'.$fileName,
        //             'boolIsActive' => 1
        //             )); 
        //         }

        //         $pattern->save();
        //         return Redirect::to('/maintenance/segment-pattern?success=true');
        //     } else return Redirect::to('/maintenance/segment-pattern?success=duplicate');
        // }else return Redirect::to('/maintenance/segment-pattern?input=invalid');
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
