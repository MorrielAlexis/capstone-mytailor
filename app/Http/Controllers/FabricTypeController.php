<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FabricType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FabricTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the fabric types
          
        $ids = \DB::table('tblFabricType')
            ->select('strFabricTypeID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strFabricTypeID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strFabricTypeID;
        $newID = $this->smartCounter($ID);  
        $fabricType = FabricType::all();

        //load the view and pass the fabric types

         return view('maintenance-fabric-type')
                    ->with('fabricType', $fabricType)
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
        $fabrics = FabricType::get();

            $fabricType = FabricType::create(array(
            'strFabricTypeID' => $request->input('addFabricTypeID'),
            'strFabricTypeName' => trim($request->input('addFabricTypeName')),
            'txtFabricTypeDesc' => trim($request->input('addFabricTypeDesc')),
            'boolIsActive' => 1
            ));

            $fabricType->save();


        \Session::flash('flash_message','Fabric type successfully added.');

        return redirect('maintenance/fabric-type');
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


    function update_fabrictype(Request $request)

    {   
       
        $fabricType = FabricType::find($request->input('editFabricTypeID'));

                $fabricType->strFabricTypeName = trim($request->get('editFabricTypeName'));    
                $fabricType->txtFabricTypeDesc = trim($request->get('editFabricTypeDesc'));

                $fabricType->save();

        \Session::flash('flash_message_update','Fabric type successfully updated.');

        return redirect('maintenance/fabric-type');

    }


    function delete_fabrictype(Request $request)
    {
            $id = $request->input('delFabricID');
            $fabricType = FabricType::find($request-> input('delFabricID'));

            $count = \DB::table('tblSwatchName')
                ->join('tblFabricType', 'tblSwatchName.strSwatchNameTypeFK', '=', 'tblFabricType.strFabricTypeID')
                ->select('tblFabricType.*')
                ->where('tblFabricType.strFabricTypeID','=', $id)
                ->count();

            if ($count != 0){
                    return redirect('maintenance/fabric-type?success=beingUsed'); 
                }else {

            $fabricType->strFabricTypeInactiveReason = trim($request->input('delInactiveFabricType'));
            $fabricType->boolIsActive = 0;
            $fabricType->save();

        \Session::flash('flash_message_delete','Fabric type successfully deactivate.');

        return redirect('maintenance/fabric-type');
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
