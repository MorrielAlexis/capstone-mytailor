<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialThreadController extends Controller
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

        $thread = Thread::all();

        return view('maintenance-material-thread')
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
