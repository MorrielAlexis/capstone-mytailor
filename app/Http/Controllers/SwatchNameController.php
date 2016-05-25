<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SwatchNameMaintenance;
use App\FabricType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SwatchNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get all the swatch names

        $ids = \DB::table('tblSwatchName')
            ->select('strSwatchNameID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strSwatchNameID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strSwatchNameID;
        $newID = $this->smartCounter($ID);  

        $fabricType = FabricType::all();
        $swatchnamemainte = SwatchNameMaintenance::all();

         $swatchnamemainte = \DB::table('tblSwatchName')
            ->join('tblFabricType', 'tblSwatchName.strSwatchNameTypeFK', '=', 'tblFabricType.strFabricTypeID')
            ->select('tblSwatchName.*', 'tblFabricType.strFabricTypeName')

            ->get();


        //load the view and pass the employees
        return view('maintenance-swatch-name')
                    ->with('swatchnamemainte', $swatchnamemainte)
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
        $swatchnamemainte = SwatchNameMaintenance::create(array(
                'strSwatchNameID' => $request->input('addSwatchNameID'),
                'strSwatchNameTypeFK' =>$request->input('addCategory'),
                'strSName' =>trim($request->input('addSwatchName')),
                'txtSwatchNameDesc' => trim($request->input('addSwatchDesc')),  
                'boolIsActive' => 1
            ));
        $added = $swatchnamemainte->save();

        return redirect('maintenance/swatch-name?success=true');
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

    function update_swatchname(Request $request)
    {
         $swatchnamemainte = SwatchNameMaintenance::find($request->input('editSwatchNameID'));
                $swatchnamemainte->strSwatchNameTypeFK = trim($request->input('editCategory'));

               $swatchnamemainte->strSName = trim($request->input('editSName'));
               $swatchnamemainte->txtSwatchNameDesc = trim($request->input('editSwatchNameDesc'));
        $swatchnamemainte->save();

         return redirect('maintenance/swatch-name');
    }

    function delete_swatchname(Request $request)
    {
        $swatchnamemainte = SwatchNameMaintenance::find($request->input('delSwatchNameID'));

        $swatchnamemainte->strSwatchNameInactiveReason = trim($request->input('delInactiveSwatchName'));
        $swatchnamemainte->boolIsActive = 0;
        $swatchnamemainte->save();

        return redirect('maintenance/swatch-name');
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