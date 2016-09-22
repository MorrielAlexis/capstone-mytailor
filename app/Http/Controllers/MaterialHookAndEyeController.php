<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HookAndEye;

use App\Http\Requests;
use App\Http\Requests\MaintenanceHookEyeRequest;
use App\Http\Controllers\Controller;

class MaterialHookAndEyeController extends Controller
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
        $ids = \DB::table('tblHookEye')
            ->select('intHookID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intHookID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intHookID;
        $newHookID = $this->smartCounter($ID); 

        $hook = HookAndEye::all();

        return view('maintenance.maintenance-material-hookandeye')
                    ->with('hooks', $hook)
                    ->with('newHookID', $newHookID);;
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
    public function store(MaintenanceHookEyeRequest $request)
    {
       
       $file = $request->input('addImage');
        $destinationPath = 'imgMaterialHooks';

                if($file == '' || $file == null){
                $hook = HookAndEye::create(array(
                    'intHookID' => $request->input('intHookID'),
                    'strHookBrand' => trim($request->input('strHookBrand')),
                    'strHookSize' => trim($request->input('strHookSize')),
                    'strHookColor' => trim($request->input('strHookColor')),
                    'textHookDesc' => trim($request->input('textHookDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $hook = HookAndEye::create(array(
                    'intHookID' => $request->input('intHookID'),
                    'strHookBrand' => trim($request->input('strHookBrand')),
                    'strHookSize' => trim($request->input('strHookSize')),
                    'strHookColor' => trim($request->input('strHookColor')),
                    'textHookDesc' => trim($request->input('textHookDesc')),
                    'strHookImage' => 'imgMaterialHooks/'.$file,
                    'boolIsActive' => 1
                        ));
                }
                $hook ->save();

                \Session::flash('flash_message','Hook and eye successfully added.'); //flash message

                return redirect('maintenance/material-hookandeye');
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

    function delete_hookeye(Request $request)
    {
        $hook = HookAndEye::find($request->input('delHookID'));

        $hook->strHookInactiveReason = trim($request->input('delInactiveHook'));
        $hook->boolIsActive = 0;
        $hook->save();

        \Session::flash('flash_message_delete','Hook and eye successfully deactivated.'); //flash message

        return redirect('maintenance/material-hookandeye');
    }

    function update_hookeye(Request $request)
    {
        $hook = HookAndEye::find($request->input('editHookID'));
        $checkHooks = HookAndEye::all();

        $file = $request->input('editHookImage');
        $destinationPath = 'imgMaterialHooks';
        $isAdded = FALSE;

        foreach ($checkHooks as $checkHook)
            if(!strcasecmp($checkHook->intHookID, $request->input('editHookID')) == 0 &&
                strcasecmp($checkHook->strHookBrand, trim($request->input('editHookBrand'))) == 0 &&
                strcasecmp($checkHook->strHookSize, trim($request->input('editHookSize'))) == 0 &&
                strcasecmp($checkHook->strHookColor, trim($request->input('editHookColor'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){

                if($file == $hook->strHookImage)
                {
                   $hook ->strHookBrand = trim($request->input('editHookBrand'));
                    $hook ->strHookSize = trim($request->input('editHookSize'));
                    $hook ->strHookColor = trim($request->input('editHookColor'));
                    $hook ->textHookDesc = trim($request->input('editHookDesc'));
                    
                }else{
                    $request->file('editImg')->move($destinationPath);
                    $hook ->strHookBrand = trim($request->input('editHookBrand'));
                    $hook ->strHookSize = trim($request->input('editHookSize'));
                    $hook ->strHookColor = trim($request->input('editHookColor'));
                    $hook ->textHookDesc = trim($request->input('editHookDesc'));
                   $hook ->strHookImage = 'imgMaterialHooks/'.$file;
                   
                }
                $hook ->save();

                \Session::flash('flash_message_update','Hook and eye successfully updated.'); //flash message
         }else \Session::flash('flash_message_duplicate','Hook and eye  already exists.'); //flash message   

                return redirect('maintenance/material-hookandeye');

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
