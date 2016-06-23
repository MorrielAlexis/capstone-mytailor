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
                    'strNeedleID' => $request->input('strNeedleID'),
                    'strNeedleBrand' => trim($request->input('strNeedleBrand')),
                    'strNeedleSize' => trim($request->input('strNeedleSize')),
                    'strNeedleDesc' => trim($request->input('strNeedleDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $Needle = Needle::create(array(
                    'strNeedleID' => $request->input('strNeedleID'),
                    'strNeedleBrand' => trim($request->input('strNeedleBrand')),
                    'strNeedleSize' => trim($request->input('strNeedleSize')),
                    'strNeedleDesc' => trim($request->input('strNeedleDesc')),
                    'strNeedleImage' => 'imgMaterialNeedles/'.$file,
                    'boolIsActive' => 1
                        ));
                }
                $Needle ->save();

                \Session::flash('flash_message','Needle successfully added.'); //flash message

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
        $needle = Needle::find($request->input('editNeedleID'));

        $file = $request->input('editNeedleImage');
        $destinationPath = 'imgMaterialNeedles';

                if($file == $needle->strNeedleImage)
                {
                    $needle->strNeedleBrand = trim($request->input('editNeedleBrand'));
                    $needle->strNeedleSize = trim($request->input('editNeedleSize'));
                    $needle->strNeedleDesc = trim($request->input('editNeedleDesc'));    
                }else{  
                    $destinationPath = 'imgNeedles';
                    $request->file('editImg')->move($destinationPath);

                    $needle->strNeedleBrand = trim($request->input('editNeedleBrand'));
                    $needle->strNeedleSize = trim($request->input('editNeedleSize'));
                    $needle->strNeedleDesc = trim($request->input('editNeedleDesc'));
                    $needle->strNeedleImage = 'imgMaterialNeedles/'.$file;
                }
                $needle->save();

                \Session::flash('flash_message_update','Needle successfully updated.'); //flash message

                return redirect('/maintenance/material-needle');
    }

     function delNeedle(Request $request)
    {
        $id = $request->input('delNeedleID');
        $Needle = Needle::find($id);

        $Needle->strNeedleInactiveReason = trim($request->input('delInactiveNeedle'));
        $Needle->boolIsActive = 0;

        $Needle->save();

        \Session::flash('flash_message_delete','Needle successfully deactivated.'); //flash message

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
