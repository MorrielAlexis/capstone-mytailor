<?php

namespace App\Http\Controllers;

use App\FabricPatternMaintenance;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MaintenanceFabricPatternRequest;
use App\Http\Controllers\Controller;

class FabricPatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //get all the fabric pattern

        $ids = \DB::table('tblFabricPattern')
            ->select('strFabricPatternID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strFabricPatternID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strFabricPatternID;
        $newID = $this->smartCounter($ID);  
        $fabricPattern = FabricPatternMaintenance::all();


        //load the view and pass the employees
        return view('maintenance-fabric-pattern')
                ->with('fabricPattern', $fabricPattern)
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
    public function store(MaintenanceFabricPatternRequest $request)
    {
         $fabricPatterns = FabricPatternMaintenance::get();

            $fabricPattern = FabricPatternMaintenance::create(array(
            'strFabricPatternID' => $request->input('strFabricPatternID'),
            'strFabricPatternName' => trim($request->input('strFabricPatternName')),
            'txtFabricPatternDesc' => trim($request->input('txtFabricPatternDesc')),
            'boolIsActive' => 1
            ));

            $fabricPattern->save();


        \Session::flash('flash_message',' Fabric pattern successfully added.');

        return redirect('maintenance/fabric-pattern');
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

    function update_fabricPattern(Request $request)

    {   
       
        $fabricPattern = FabricPatternMaintenance::find($request->input('editfabricColor'));

                $fabricPattern->strFabricPatternName = trim($request->get('editFabricPatternName'));    
                $fabricPattern->txtFabricPatternDesc = trim($request->get('editFabricPatternDesc'));
                $fabricPattern->save();

        \Session::flash('flash_message_update','Pattern successfully updated.');

        return redirect('maintenance/fabric-pattern');

    }


    function delete_fabricPattern(Request $request)
    {
            $id = $request->input('delFabricPatternID');
            $fabricPattern = FabricPatternMaintenance::find($request-> input('delFabricPatternID'));

            // $count = \DB::table('tblSwatchName')
            //     ->join('tblFabricType', 'tblSwatchName.strSwatchNameTypeFK', '=', 'tblFabricType.strFabricTypeID')
            //     ->select('tblFabricType.*')
            //     ->where('tblFabricType.strFabricTypeID','=', $id)
            //     ->count();

            // $count2 = \DB::table('tblSwatch')
            //     ->join('tblFabricType', 'tblSwatch.strSwatchTypeFK', '=', 'tblFabricType.strFabricTypeID')
            //     ->select('tblFabricType.*')
            //     ->where('tblFabricType.strFabricTypeID','=', $id)
            //     ->count();

            // if ($count != 0 || $count2 != 0){
            //         return redirect('maintenance/fabric-type?success=beingUsed'); 
            //     }else {

            $fabricPattern->strFabricPatternInactiveReason = trim($request->input('delInactiveFabricPattern'));
            $fabricPattern->boolIsActive = 0;
            $fabricPattern->save();

        \Session::flash('flash_message_delete','Pattern successfully deactivated.');

        return redirect('maintenance/fabric-pattern');
        
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
