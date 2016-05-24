<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Needle;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialNeedleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = \DB::table('tblNeedle')
            ->select('intNeedleID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intNeedleID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intNeedleID;
        $newNeedleID = $this->smartCounter($ID);  
        
        $needle = Needle::all();

        return view('maintenance-material-needle')
                    ->with('needles', $needle)
                    ->with('newNeedleID', $newNeedleID);
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
        $file = $request->input('addImage');
        $destinationPath = 'imgNeedles';

                if($file == '' || $file == null){
                $Needle = Needle::create(array(
                    'strNeedleID' => $request->input('addNeedleID'),
                    'strNeedleBrand' => trim($request->input('addNeedleBrand')),
                    'strNeedleSize' => trim($request->input('addNeedleSize')),
                    'strNeedleDesc' => trim($request->input('addNeedleDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $Needle = Needle::create(array(
                    'strNeedleID' => $request->input('addNeedleID'),
                    'strNeedleBrand' => trim($request->input('addNeedleBrand')),
                    'strNeedleSize' => trim($request->input('addNeedleSize')),
                    'strNeedleDesc' => trim($request->input('addNeedleDesc')),
                    'strNeedleImage' => 'imgMaterialNeedles/'.$file,
                    'boolIsActive' => 1
                        ));
                }
                $Needle ->save();

                return redirect('/maintenance/material-needle');
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

  
    

     function editNeedle(Request $request)
    {
        $isAdded = FALSE;

        $id = $request->input('editNeedleID');
        $Needle = Needle::find($id);

                if($request->input('editNeedleImage') == $Needle->strNeedleImage){
                    $Needle->strNeedleBrand = trim($request->input('editNeedleBrand'));
                    $Needle->strNeedleSize = trim($request->input('editNeedleSize'));
                    $Needle->strNeedleDesc = trim($request->input('editNeedleDesc'));    
                }else{  
                    $destinationPath = 'imgNeedles';
                    $request->file('editImg')->move($destinationPath);

                    $Needle->strNeedleBrand = trim($request->input('editNeedleBrand'));
                    $Needle->strNeedleSize = trim($request->input('editNeedleSize'));
                    $Needle->strNeedleDesc = trim($request->input('editNeedleDesc'));
                    $Needle->strNeedleImage = 'imgMaterialNeedles/'.$fileBrand;
                }
                $Needle->save();
                return redirect('/maintenance/material-needle');
    }

     function delNeedle(Request $request)
    {
        $id = $request->input('delNeedleID');
        $Needle = Needle::find($id);

        $Needle->strNeedleInactiveReason = trim($request->input('delInactiveNeedle'));
        $Needle->boolIsActive = 0;

        $Needle->save();

        return redirect('maintenance/material-needle');
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
