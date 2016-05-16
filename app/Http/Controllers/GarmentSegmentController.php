<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GarmentCategory;
use App\GarmentSegment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GarmentSegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the garment segment
        $ids = \DB::table('tblSegment')
            ->select('strSegmentID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strSegmentID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strSegmentID;
        $newID = $this->smartCounter($ID);  

        $garment =  GarmentCategory::all();

        $segment = \DB::table('tblSegment')
            ->join('tblGarmentCategory', 'tblSegment.strSegCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
            ->select('tblSegment.*', 'tblGarmentCategory.strGarmentCategoryName')

            ->get();

        return view('maintenance-garment-segment')
                    ->with('segment', $segment)
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
    public function store(Request $request)
    {
        $seg = GarmentSegment::get();

            $segment = GarmentSegment::create(array(

                    'strSegmentID' => $request->input('addSegmentID'),
                    'strSegCategoryFK' =>$request->input('addCategory'),
                    'strSegmentName' =>trim($request->input('addSegmentName')),
                    'textSegmentDesc' => trim($request->input('addSegmentDesc')),
                    'boolIsActive' => 1

            ));

             $segment->save();

        return redirect('maintenance/garment-segment');   
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

     function updateGarmentSegment(Request $request)
    {
        $segment = GarmentSegment::find($request->input('editSegmentID'));

                $segment->strSegCategoryFK = $request->input('editCategory'); 
                $segment->strSegmentName = trim($request->input('editSegmentName'));  
                $segment->textSegmentDesc = trim($request->input('editSegmentDesc'));
                
                $segment->save();

         return redirect('maintenance/garment-segment');      
    }

    function deleteGarmentSegment(Request $request)
    {
        $segment = GarmentSegment::find($request->input('delSegmentID'));

        $segment->boolIsActive = 0;

        $segment->save();

       return redirect('maintenance/garment-segment');
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
