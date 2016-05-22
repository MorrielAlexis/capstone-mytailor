<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Swatch;
use App\FabricType;
use App\SwatchNameMaintenance;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get all the fabric types

        $ids = \DB::table('tblSwatch')
            ->select('strSwatchID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strSwatchID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strSwatchID;
        $newID = $this->smartCounter($ID);  

        $fabricType =  FabricType::all();
        $swatchnamemainte = SwatchNameMaintenance::all();        
        
        $swatch = \DB::table('tblSwatch')
            ->join('tblFabricType', 'tblSwatch.strSwatchTypeFK', '=', 'tblFabricType.strFabricTypeID')
            ->join('tblSwatchName', 'tblSwatch.strSwatchNameFK', '=', 'tblSwatchName.strSwatchNameID')
            ->select('tblSwatch.*', 'tblFabricType.strFabricTypeName', 'tblSwatchName.strSName')
            ->orderBy('strSwatchID')
            ->get();


        //load the view and pass the employees
        return view('maintenance-swatches')
                    ->with('fabricType', $fabricType)
                    ->with('swatch', $swatch)
                    ->with('swatchnamemainte', $swatchnamemainte)
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
        //
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


    function delete_swatch(Request $request)
    {
        $swatch = Swatch::find($request->input('delSwatchID'));

        $swatch->strSwatchInactiveReason = trim($request->input('delInactiveSwatch'));
        $swatch->boolIsActive = 0;
        $swatch->save();

        return redirect('maintenance/swatch');
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
