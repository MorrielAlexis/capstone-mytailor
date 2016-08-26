<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FabricThreadCount;
use App\Http\Requests;
use App\Http\Requests\MaintenanceThreadCountRequest;
use App\Http\Controllers\Controller;

class FabricThreadCountController extends Controller
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
         //get all the swatch names

        $ids = \DB::table('tblFabricThreadCount')
            ->select('strFabricThreadCountID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strFabricThreadCountID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strFabricThreadCountID;
        $newID = $this->smartCounter($ID);  
        $threadCount = FabricThreadCount::all();


        //load the view and pass the employees
        return view('maintenance-fabric-thread-count')
                    ->with('threadCount', $threadCount)
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
    public function store(MaintenanceThreadCountRequest $request)
    {
        $threadCounts = FabricThreadCount::get();

            $threadCount = FabricThreadCount::create(array(
            'strFabricThreadCountID' => $request->input('strFabricThreadCountID'),
            'strFabricThreadCountName' => trim($request->input('strFabricThreadCountName')),
            'txtFabricThreadCountDesc' => trim($request->input('txtFabricThreadCountDesc')),
            'boolIsActive' => 1
            ));

            $threadCount->save();


        \Session::flash('flash_message',' Thread count successfully added.');

        return redirect('maintenance/fabric-thread-count');
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

   function update_threadCount(Request $request)
    {   
       $checkThreadCounts = FabricThreadCount::all();
        $isAdded=FALSE;

        foreach($checkThreadCounts as $checkThreadCount)
            if(!strcasecmp($checkThreadCount->strFabricThreadCountID, $request->input('editThreadCount')) == 0 && strcasecmp($checkThreadCount->strFabricThreadCountName,$request->input('editThreadCountName')) == 0)
                $isAdded = TRUE;

        if(!$isAdded){
        $threadCount = FabricThreadCount::find($request->input('editThreadCount'));

                $threadCount->strFabricThreadCountName = trim($request->get('editThreadCountName'));    
                $threadCount->txtFabricThreadCountDesc = trim($request->get('editThreadCountDesc'));

                $threadCount->save();

        \Session::flash('flash_message_update','Thread count successfully updated.');
         }else \Session::flash('flash_message_duplicate','Thread count already exists.'); //flash message

        return redirect('maintenance/fabric-thread-count');

    }


    function delete_threadCount(Request $request)
    {
            $id = $request->input('delThreadCountID');
            $threadCount = FabricThreadCount::find($request-> input('delThreadCountID'));

            $count = \DB::table('tblFabric')
                ->join('tblFabricThreadCount', 'tblFabric.strFabricThreadCountFK', '=', 'tblFabricThreadCount.strFabricThreadCountID')
                ->select('tblFabricThreadCount.*')
                ->where('tblFabricThreadCount.strFabricThreadCountID','=', $id)
                ->count();


            if ($count != 0){
                    return redirect('maintenance/fabric-thread-count?success=beingUsed'); 
                }else {

            $threadCount->strFabricThreadCountInactiveReason = trim($request->input('delInactiveThreadCount'));
            $threadCount->boolIsActive = 0;
            $threadCount->save();

        \Session::flash('flash_message_delete','Thread count successfully deactivated.');

        return redirect('maintenance/fabric-thread-count');
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
