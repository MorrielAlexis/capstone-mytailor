<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread;
use App\Needle;
use App\Button;
use App\Zipper;
use App\HookAndEye;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = \DB::table('tblThread')
            ->select('intThreadID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intThreadID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intThreadID;
        $newThreadID = $this->smartCounter($ID);    

        /////NEEDLES/////
        $ids = \DB::table('tblNeedle')
            ->select('intNeedleID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intNeedleID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intNeedleID;
        $newNeedleID = $this->smartCounter($ID);    

        /////BUTTONS/////
        $ids = \DB::table('tblButton')
            ->select('intButtonID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intButtonID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intButtonID;
        $newButtonID = $this->smartCounter($ID);    

        /////ZIPPERS/////
        $ids = \DB::table('tblZipper')
            ->select('intZipperID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intZipperID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intZipperID;
        $newZipperID = $this->smartCounter($ID);    

        /////HOOK AND EYE/////
        $ids = \DB::table('tblHookEye')
            ->select('intHookID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intHookID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intHookID;
        $newHookID = $this->smartCounter($ID);  


        $thread = Thread::all();
        $needle = Needle::all();
        $button = Button::all();
        $zipper = Zipper::all();
        $hook = HookAndEye::all();

        return view('maintenance-materials')
                    ->with('threads', $thread)
                    ->with('newThreadID', $newThreadID)
                    ->with('needles', $needle)
                    ->with('newNeedleID', $newNeedleID)
                    ->with('buttons', $button)
                    ->with('newButtonID', $newButtonID)
                    ->with('zippers', $zipper)
                    ->with('newZipperID', $newZipperID)
                    ->with('hooks', $hook)
                    ->with('newHookID', $newHookID);
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

        ///////////THREADS/////////////
    public function addThread(Request $request)
    {   
        $file = $request->input('addImage');
        $destinationPath = 'imgThreads';

                if($file == '' || $file == null){
                $thread = Thread::create(array(
                    'strThreadID' => $request->input('addThreadID'),
                    'strThreadBrand' => trim($request->input('addThreadBrand')),
                    'strThreadColor' => trim($request->input('addThreadColor')),
                    'strThreadDesc' => trim($request->input('addThreadDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $thread = Thread::create(array(
                    'strThreadID' => $request->input('addThreadID'),
                    'strThreadBrand' => trim($request->input('addThreadBrand')),
                    'strThreadColor' => trim($request->input('addThreadColor')),
                    'strThreadDesc' => trim($request->input('addThreadDesc')),
                    'strThreadImage' => 'imgMaterialThreads/'.$fileBrand,
                    'boolIsActive' => 1
                        ));
                }
                $thread ->save();

                return redirect('/maintenance/material');
    }

    public function editThread(Request $request)
    {
        $isAdded = FALSE;

        $id = $request->input('editThreadID');
        $thread = Thread::find($id);

                if($request->input('editThreadImage') == $thread->strThreadImage){
                    $thread->strThreadBrand = trim($request->input('editThreadBrand'));
                    $thread->strThreadColor = trim($request->input('editThreadColor'));
                    $thread->strThreadDesc = trim($request->input('editThreadDesc'));    
                }else{  
                    $destinationPath = 'imgThreads';
                    $request->file('editImg')->move($destinationPath);

                    $thread->strThreadBrand = trim($request->input('editThreadBrand'));
                    $thread->strThreadColor = trim($request->input('editThreadColor'));
                    $thread->strThreadDesc = trim($request->input('editThreadDesc'));
                    $thread->strThreadImage = 'imgMaterialThreads/'.$fileBrand;
                }
                $thread->save();
                return redirect('/maintenance/material');
    }

    public function delThread(Request $request)
    {
        $id = $request->input('delThreadID');
        $thread = Thread::find($id);

        $thread->boolIsActive = 0;

        $thread->save();

        return redirect('maintenance/material');
    }

    public function addNeedle(Request $request)
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
                    'strNeedleImage' => 'imgMaterialNeedles/'.$fileBrand,
                    'boolIsActive' => 1
                        ));
                }
                $Needle ->save();

                return redirect('/maintenance/material');
    }

    public function editNeedle(Request $request)
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
                return redirect('/maintenance/material');
    }

    public function delNeedle(Request $request)
    {
        $id = $request->input('delNeedleID');
        $Needle = Needle::find($id);

        $Needle->boolIsActive = 0;

        $Needle->save();

        return redirect('maintenance/material');
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
