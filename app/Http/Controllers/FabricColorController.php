<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FabricColorMaintenance;
use App\Http\Requests;
use App\Http\Requests\MaintenanceFabricColorRequest;
use App\Http\Controllers\Controller;

class FabricColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the fabric colors

        $ids = \DB::table('tblFabricColor')
            ->select('strFabricColorID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strFabricColorID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strFabricColorID;
        $newID = $this->smartCounter($ID);  
        $fabricColor = FabricColorMaintenance::all();


        //load the view and pass the employees
        return view('maintenance-fabric-color')
                ->with('fabricColor', $fabricColor)
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
    public function store(MaintenanceFabricColorRequest $request)
    {
        $fabricColors = FabricColorMaintenance::get();

            $fabricColor = FabricColorMaintenance::create(array(
            'strFabricColorID' => $request->input('strFabricColorID'),
            'strFabricColorName' => trim($request->input('strFabricColorName')),
            'txtFabricColorDesc' => trim($request->input('txtFabricColorDesc')),
            'boolIsActive' => 1
            ));

            $fabricColor->save();


        \Session::flash('flash_message',' Fabric color successfully added.');

        return redirect('maintenance/fabric-color');
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

    function update_fabricColor(Request $request)

    {   
       
        $fabricColor = FabricColorMaintenance::find($request->input('editfabricColor'));

                $fabricColor->strFabricColorName = trim($request->get('editColorName'));    
                $fabricColor->txtFabricColorDesc = trim($request->get('editColorDesc'));

                $fabricColor->save();

        \Session::flash('flash_message_update','Color successfully updated.');

        return redirect('maintenance/fabric-color');

    }


    function delete_fabricColor(Request $request)
    {
            $id = $request->input('delfabricColorID');
            $fabricColor = FabricColorMaintenance::find($request-> input('delfabricColorID'));

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

            $fabricColor->strFabricColorInactiveReason = trim($request->input('delInactivefabricColor'));
            $fabricColor->boolIsActive = 0;
            $fabricColor->save();

        \Session::flash('flash_message_delete','Color successfully deactivated.');

        return redirect('maintenance/fabric-color');
        
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
