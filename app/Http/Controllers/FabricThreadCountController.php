<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FabricThreadCountMaintenance;
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

        $ids = \DB::table('tblThreadCount')
            ->select('strThreadCountID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strThreadCountID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strThreadCountID;
        $newID = $this->smartCounter($ID);  
        $threadCount = FabricThreadCountMaintenance::all();


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
        $threadCounts = FabricThreadCountMaintenance::get();

            $threadCount = FabricThreadCountMaintenance::create(array(
            'strThreadCountID' => $request->input('strThreadCountID'),
            'strThreadCountName' => trim($request->input('strThreadCountName')),
            'txtThreadCountDesc' => trim($request->input('txtThreadCountDesc')),
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
       
        $threadCount = FabricThreadCountMaintenance::find($request->input('editFabricTypeID'));

                $threadCount->strThreadCountName = trim($request->get('editFabricTypeName'));    
                $threadCount->txtThreadCountDesc = trim($request->get('editFabricTypeDesc'));

                $threadCount->save();

        \Session::flash('flash_message_update','Thread count successfully updated.');

        return redirect('maintenance/fabric-type');

    }


    function delete_threadCount(Request $request)
    {
            $id = $request->input('delThreadCountID');
            $threadCount = FabricThreadCountMaintenance::find($request-> input('delThreadCountID'));

            // $count = \DB::table('tblSwatchName')
            //     ->join('tblFabricType', 'tblSwatchName.strSwatchNameTypeFK', '=', 'tblFabricType.strFabricTypeID')
            //     ->select('tblFabricType.*')
            //     ->where('tblFabricType.strFabricTypeID','=', $id)
            //     ->count();

            // $count2 = \DB::table('tblSwatch')
            //     ->join('tblFabricType', 'tblSwatch.strSwatchTypeFK', '=', 'tblFabricType.strFabricTypeID')
            //     ->select('tblFabricType.*')
            //     ->where('tblFabricType.strFabricTypeID','=', $id)
            //     ->count();

            // if ($count != 0 || $count2 != 0){
            //         return redirect('maintenance/fabric-type?success=beingUsed'); 
            //     }else {

            $threadCount->strFabricTypeInactiveReason = trim($request->input('delInactiveFabricType'));
            $threadCount->boolIsActive = 0;
            $threadCount->save();

        \Session::flash('flash_message_delete','Thread count successfully deactivated.');

        return redirect('maintenance/fabric-thread-count');
        
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
