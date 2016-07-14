<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Zipper;

use App\Http\Requests;
use App\Http\Requests\MaintenanceZipperRequest;
use App\Http\Controllers\Controller;

class MaterialZipperController extends Controller
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
        $ids = \DB::table('tblZipper')
            ->select('intZipperID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intZipperID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intZipperID;
        $newZipperID = $this->smartCounter($ID);  

        $zipper = Zipper::all();

        return view('maintenance-material-zipper')
                    ->with('zippers', $zipper)
                    ->with('newZipperID', $newZipperID);
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
    public function store(MaintenanceZipperRequest $request)
    {
        $file = $request->input('addImage');
        $destinationPath = 'imgMaterialZippers';

                if($file == '' || $file == null){
                $zipper = Zipper::create(array(
                    'intZipperID' => $request->input('intZipperID'),
                    'strZipperBrand' => trim($request->input('strZipperBrand')),
                    'strZipperColor' => trim($request->input('strZipperColor')),
                    'txtZipperDesc' => trim($request->input('txtZipperDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $zipper = Zipper::create(array(
                    'intZipperipperID' => $request->input('intZipperID'),
                    'strZipperBrand' => trim($request->input('strZipperBrand')),
                    'strZipperColor' => trim($request->input('strZipperColor')),
                    'txtZipperDesc' => trim($request->input('txtZipperDesc')),
                    'strZipperImage' => 'imgMaterialZippers/'.$file,
                    'boolIsActive' => 1
                        ));
                }
                $zipper ->save();

                \Session::flash('flash_message','Zipper successfully added.'); //flash message

                return redirect('maintenance/material-zipper');

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

    function update_zipper(Request $request)
    {
       $zipper = Zipper::find($request->input('editZipperID'));

        $file = $request->input('editZipperImage');
        $destinationPath = 'imgMaterialZippers';

                if($file == $zipper->strZipperImage)
                 {
                    $zipper->strZipperBrand = trim($request->input('editZipperBrand'));
                    $zipper->strZipperColor = trim($request->input('editZipperColor'));
                    $zipper->strZipperSize = trim($request->input('editZipperSize'));
                    $zipper->txtZipperDesc = trim($request->input('editZipperDesc'));    
                }else{  
                    $request->file('editImg')->move($destinationPath);

                    $zipper->strZipperBrand = trim($request->input('editZipperBrand'));
                    $zipper->strZipperColor = trim($request->input('editZipperColor'));
                     $zipper->strZipperSize = trim($request->input('editZipperSize'));
                    $zipper->txtZipperDesc = trim($request->input('editZipperDesc'));
                    $zipper->strZipperImage = 'imgMaterialZippers/'.$file;
                }
                $zipper->save();

                \Session::flash('flash_message_update','Zipper successfully updated.'); //flash message

                return redirect('maintenance/material-zipper');  

                
    }

    function delete_zipper(Request $request)
    {
        $zipper = Zipper::find($request->input('delZipperID'));

        $zipper->strZipperInactiveReason = trim($request->input('delInactiveZipper'));
        $zipper->boolIsActive = 0;
        $zipper->save();

        \Session::flash('flash_message_delete','Zipper successfully deactivated.'); //flash message

        return redirect('maintenance/material-zipper');
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
