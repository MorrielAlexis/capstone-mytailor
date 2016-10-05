<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread;

use App\Http\Requests;
use App\Http\Requests\MaintenanceThreadRequest;
use App\Http\Controllers\Controller;

class MaterialThreadController extends Controller
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
        $ids = \DB::table('tblThread')
            ->select('intThreadID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intThreadID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intThreadID;
        $newThreadID = $this->smartCounter($ID);    

        $thread = Thread::all();

        return view('maintenance.maintenance-material-thread')
                    ->with('threads', $thread)
                    ->with('newThreadID', $newThreadID);
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
    public function store(MaintenanceThreadRequest $request)
    { 
        $file = $request->input('addImage');
        $destinationPath = 'imgMaterialThreads';

                if($file == '' || $file == null){
                $thread = Thread::create(array(
                    'intThreadID' => $request->input('intThreadID'),
                    'strThreadBrand' => trim($request->input('strThreadBrand')),
                    'strThreadColor' => trim($request->input('strThreadColor')),
                    'strThreadDesc' => trim($request->input('strThreadDesc')),
                    'boolIsActive' => 1
                    ));
                }else{
                    $request->file('addImg')->move($destinationPath);

                    $thread = Thread::create(array(
                    'intThreadID' => $request->input('intThreadID'),
                    'strThreadBrand' => trim($request->input('strThreadBrand')),
                    'strThreadColor' => trim($request->input('strThreadColor')),
                    'strThreadDesc' => trim($request->input('strThreadDesc')),
                    'strThreadImage' => 'imgMaterialThreads/'.$file,
                    'boolIsActive' => 1
                        ));
                }
                $thread ->save();

                 \Session::flash('flash_message','Thread successfully added.'); //flash message

                return redirect('maintenance/material-thread');
    
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


     function editThread(Request $request)
    {

        $thread = Thread::find($request->input('editThreadID'));
        $checkThreads = Thread::all();

        $file = $request->input('strThreadImage');
        $destinationPath = 'imgMaterialThreads';
        $isAdded = FALSE;

        foreach ($checkThreads as $checkThread)
            if(!strcasecmp($checkThread->intThreadID, $request->input('editThreadID')) == 0 &&
                strcasecmp($checkThread->strThreadBrand, $request->input('editThreadBrand')) == 0 &&
                strcasecmp($checkThread->strThreadColor, trim($request->input('editThreadColor'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){

                if($file == $thread->editThreadImage)
                
                {
                    $thread->strThreadBrand = trim($request->input('editThreadBrand'));
                    $thread->strThreadColor = trim($request->input('editThreadColor'));
                    $thread->strThreadDesc = trim($request->input('editThreadDesc'));    
                }else{  
                    $destinationPath = 'imgThreads';
                    $request->file('editImg')->move($destinationPath, $file);

                    $thread->strThreadBrand = trim($request->input('editThreadBrand'));
                    $thread->strThreadColor = trim($request->input('editThreadColor'));
                    $thread->strThreadDesc = trim($request->input('editThreadDesc'));
                    $thread->strThreadImage = 'imgMaterialThreads/'.$file;
                }
                $thread->save();

                 \Session::flash('flash_message_update','Thread successfully updated.'); //flash message
        }else \Session::flash('flash_message_duplicate','Thread already exists.'); //flash message   

                return redirect('maintenance/material-thread');
    }

    public function deleteThread(Request $request)
    {
        $id = $request->input('delThreadID');
        $thread = Thread::find($id);

        $thread->strThreadInactiveReason = trim($request->input('delInactiveThread'));
        $thread->boolIsActive = 0;

        $thread->save();

         \Session::flash('flash_message_delete','Thread successfully deactivated.'); //flash message

        return redirect('maintenance/material-thread');
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
