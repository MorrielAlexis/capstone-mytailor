<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fabric;
use App\FabricColor;
use App\FabricType;
use App\FabricPattern;
use App\FabricThreadCount;
use App\Http\Requests;
use App\Http\Requests\MaintenanceFabricRequest;
use App\Http\Controllers\Controller;

class FabricController extends Controller
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
        //get all the fabrics
        $ids = \DB::table('tblFabric')
            ->select('strFabricID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strFabricID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strFabricID;
        $newID = $this->smartCounter($ID);  

        $fabricColor =  FabricColor::all();
        $fabricType = FabricType::all();
        $threadCount = FabricThreadCount::all();
        $fabricPattern = FabricPattern::all();


        $fabric = \DB::table('tblFabric')
            ->join('tblFabricType', 'tblFabric.strFabricTypeFK', '=', 'tblFabricType.strFabricTypeID')
            ->join('tblFabricColor', 'tblFabric.strFabricColorFK', '=', 'tblFabricColor.strFabricColorID')
            ->join('tblFabricThreadCount', 'tblFabric.strFabricThreadCountFK', '=', 'tblFabricThreadCount.strFabricThreadCountID')
            ->join('tblFabricPattern', 'tblFabric.strFabricPatternFK', '=', 'tblFabricPattern.strFabricPatternID')
            ->select('tblFabric.*', 'tblFabricType.strFabricTypeName', 'tblFabricColor.strFabricColorName', 'tblFabricPattern.strFabricPatternName','tblFabricThreadCount.strFabricThreadCountName')
            ->orderBy('strFabricID')
            ->get();


        //load the view and pass the fabrics
        return view('maintenance-fabric')
                    ->with('fabric', $fabric)
                    ->with('fabricColor', $fabricColor)
                    ->with('fabricType', $fabricType)
                    ->with('threadCount', $threadCount)
                    ->with('fabricPattern', $fabricPattern)
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
    public function store(MaintenanceFabricRequest $request)
    {
          $file = $request->input('addImage');
          $destinationPath = 'imgFabrics';

            if($file == '' || $file == null){
                $fabric = Fabric::create(array(
                'strFabricID' => $request->input('strFabricID'),
                'strFabricTypeFK' => $request->input('strFabricTypeFK'),
                'strFabricPatternFK' => $request ->input('strFabricPatternFK'),
                'strFabricColorFK' => $request->input('strFabricColorFK'),
                'strFabricThreadCountFK' => $request->input('strFabricThreadCountFK'),
                'strFabricName'  =>trim($request->input('strFabricName')),
                'dblFabricPrice'  =>trim($request->input('dblFabricPrice')),
                'strFabricCode'  =>trim($request->input('strFabricCode')),
                'txtFabricDesc'  =>trim($request->input('txtFabricDesc')),
                'boolIsActive' => 1
                ));     
                }else{
                    $request->file('addImg')->move($destinationPath, $file);

                    $fabric = Fabric::create(array(
                        'strFabricID' => $request->input('strFabricID'),
                        'strFabricTypeFK' => $request->input('strFabricTypeFK'),
                        'strFabricPatternFK' => $request ->input('strFabricPatternFK'),
                        'strFabricColorFK' => $request->input('strFabricColorFK'),
                        'strFabricThreadCountFK' => $request->input('strFabricThreadCountFK'),
                        'strFabricName'  =>trim($request->input('strFabricName')),
                        'dblFabricPrice'  =>trim($request->input('dblFabricPrice')),
                        'strFabricCode'  =>trim($request->input('strFabricCode')),
                        'txtFabricDesc'  =>trim($request->input('txtFabricDesc')),
                        'strFabricImage' => 'imgFabrics/'.$file,
                        'boolIsActive' => 1
                    )); 

                }
            $fabric->save();

              \Session::flash('flash_message','Fabric successfully added.'); //flash message

            return redirect('maintenance/fabric');
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

     function update_fabric(Request $request)
    {
        $fabric = Fabric::find($request->input('editFabricID'));

        $file = $request->input('editImage');
        $destinationPath = 'imgFabrics';

                if($file == $fabric->strFabricImage)
                {
                    
                    $fabric->strFabricTypeFK = $request->input('editFabricType');
                    $fabric->strFabricPatternFK = $request->input('editFabricPattern');
                    $fabric->strFabricColorFK = $request->input('editFabricColor');
                    $fabric->strFabricThreadCountFK = $request->input('editFabricThreadCount');
                   
                    $fabric->strFabricName = trim($request->input('editFabricName'));
                    $fabric->dblFabricPrice = trim($request->input('editFabricPrice'));
                    $fabric->strFabricCode = trim($request->input('editFabricCode'));
                    $fabric->txtFabricDesc = trim($request->input('editFabricDesc'));
                    
                }else{
                    $request->file('editImg')->move($destinationPath);

                    $fabric->strFabricTypeFK = $request->input('editFabricType');
                    $fabric->strFabricPatternFK = $request->input('editFabricPattern');
                    $fabric->strFabricColorFK = $request->input('editFabricColor');
                    $fabric->strFabricThreadCountFK = $request->input('editFabricThreadCount');
                    $fabric->strPackageSeg5FK = $request->input('editSegment5');
                    $fabric->strFabricName = trim($request->input('editFabricName'));
                    $fabric->dblFabricPrice = trim($request->input('editFabricPrice'));
                    $fabric->strFabricCode = trim($request->input('editFabricCode'));
                    $fabric->txtFabricDesc = trim($request->input('editFabricDesc'));
                    $fabric->strFabricImage = 'imgFabrics/'.$file;
                }           

                $fabric->save();

            \Session::flash('flash_message_update','Fabric was successfully updated.'); //flash message      

            
            return redirect('maintenance/fabric');
    }

    function delete_fabric(Request $request)
    {
        $fabric = Fabric::find($request->input('delFabricID'));

        $fabric->strFabricInactiveReason = trim($request->input('delInactiveFabric'));
        $fabric->boolIsActive = 0;
        $fabric->save();


       \Session::flash('flash_message_delete','Fabric was successfully deactivated.'); //flash message

        return redirect('maintenance/fabric');
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
