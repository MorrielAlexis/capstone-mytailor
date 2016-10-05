<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MaintenancePackagesRequest;
use App\Package;
use App\GarmentSegment;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
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
        
        //get all the garment segment
        $ids = \DB::table('tblPackages')
            ->select('strPackageID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strPackageID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strPackageID;
        $newID = $this->smartCounter($ID);  

        $segment =  GarmentSegment::all();

        $sets = \DB::table('tblPackages')
            ->join('tblSegment as tblSegment1', 'tblPackages.strPackageSeg1FK', '=', 'tblSegment1.strSegmentID')
            ->join('tblSegment as tblSegment2', 'tblPackages.strPackageSeg2FK', '=', 'tblSegment2.strSegmentID')
            ->join('tblSegment as tblSegment3', 'tblPackages.strPackageSeg3FK', '=', 'tblSegment3.strSegmentID')
            // ->join('tblSegment as tblSegment4', 'tblPackages.strPackageSeg4FK', '=', 'tblSegment4.strSegmentID')
            // ->join('tblSegment as tblSegment5', 'tblPackages.strPackageSeg5FK', '=', 'tblSegment5.strSegmentID')
            ->select('tblPackages.*', 'tblSegment1.strSegmentName as strSegmentName1','tblSegment2.strSegmentName as strSegmentName2','tblSegment3.strSegmentName as strSegmentName3')
            ->get();

            // 'tblSegment4.strSegmentName as strSegmentName4','tblSegment5.strSegmentName as strSegmentName5'


        //load the view and pass the employees
        return view('maintenance.maintenance-sets')
                    ->with('sets', $sets)
                    ->with('segment', $segment)
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
    public function store(MaintenancePackagesRequest $request)
    { //dd($request->input('strPackageSex'));
        $file = $request->input('addImage');
        $destinationPath = 'imgPackages';

            if($file == '' || $file == null){
                $sets = Package::create(array(
                 'strPackageID' => $request->input('strPackageID'),
                 'strPackageName' => trim($request->input('strPackageName')),
                 'strPackageSex' => trim($request->input('strPackageSex')),
                 'strPackageSeg1FK' => $request->input('strPackageSeg1FK'),
                 'strPackageSeg2FK' => $request->input('strPackageSeg2FK'),
                 'strPackageSeg3FK' => $request->input('strPackageSeg3FK'),
                 // 'strPackageSeg4FK' => $request->input('strPackageSeg4FK'),
                 // 'strPackageSeg5FK' => $request->input('strPackageSeg5FK'),
                 'dblPackagePrice' => trim($request->input('dblPackagePrice')),
                 'intPackageMinDays' => trim($request->input('intPackageMinDays')),
                 'strPackageDesc' => trim($request->input('strPackageDesc')),
                'boolIsActive' => 1
                ));     
            }else{
                $request->file('addImg')->move($destinationPath, $file);

                $sets = Package::create(array(
                'strPackageID' => $request->input('strPackageID'),
                'strPackageName' => trim($request->input('strPackageName')),
                'strPackageSex' => $request->input('strPackageSex'),
                'strPackageSeg1FK' => $request->input('strPackageSeg1FK'),
                'strPackageSeg2FK' => $request->input('strPackageSeg2FK'),
                'strPackageSeg3FK' => $request->input('strPackageSeg3FK'),
                // 'strPackageSeg4FK' => $request->input('strPackageSeg4FK'),
                // 'strPackageSeg5FK' => $request->input('strPackageSeg5FK'),
                'dblPackagePrice' => trim($request->input('dblPackagePrice')),
                'intPackageMinDays' => trim($request->input('intPackageMinDays')),
                'strPackageDesc' => trim($request->input('strPackageDesc')),
                'strPackageImage' => 'imgPackages/'.$file,
                'boolIsActive' => 1
                )); 
                }

            $sets->save();

             \Session::flash('flash_message','Set successfully created.'); //flash message
            
            return redirect('maintenance/sets');

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

    function update_package(Request $request)
    {
        $sets = Package::find($request->input('editPackageID'));
        $checkSets = Package::all();

        $file = $request->input('editImage');
        $destinationPath = 'imgPackages';
        $isAdded = FALSE;

        foreach ($checkSets as $checkSet)
            if(!strcasecmp($checkSet->strPackageID, $request->input('editPackageID')) == 0 &&
                strcasecmp($checkSet->strPackageSeg1FK, $request->input('editSegment1')) == 0 &&
                strcasecmp($checkSet->strPackageSeg2FK, $request->input('editSegment2')) == 0 &&
                strcasecmp($checkSet->strPackageSeg3FK, $request->input('editSegment3')) == 0 &&
                strcasecmp($checkSet->strPackageName, trim($request->input('editPackageName'))) == 0)
                $isAdded = TRUE;

        if(!$isAdded){

                if($file == $sets->strPackageImage)
                {
                    $sets->strPackageName = trim($request->input('editPackageName'));
                    $sets->strPackageSex = $request->input('editPackageSex');
                    $sets->strPackageSeg1FK = $request->input('editSegment1');
                    $sets->strPackageSeg2FK = $request->input('editSegment2');
                    $sets->strPackageSeg3FK = $request->input('editSegment3');
                    // $sets->strPackageSeg4FK = $request->input('editSegment4');
                    // $sets->strPackageSeg5FK = $request->input('editSegment5');
                    $sets->dblPackagePrice = trim($request->input('editPackagePrice'));
                    $sets->intPackageMinDays = trim($request->input('editPackageMinDays'));
                    $sets->strPackageDesc = trim($request->input('editPackageDesc'));
                    
                }else{
                    $request->file('editImg')->move($destinationPath, $file);

                    $sets->strPackageName = trim($request->input('editPackageName'));
                    $sets->strPackageSex = $request->input('editPackageSex');
                    $sets->strPackageSeg1FK = $request->input('editSegment1');
                    $sets->strPackageSeg2FK = $request->input('editSegment2');
                    $sets->strPackageSeg3FK = $request->input('editSegment3');
                    // $sets->strPackageSeg4FK = $request->input('editSegment4');
                    // $sets->strPackageSeg5FK = $request->input('editSegment5');
                    $sets->dblPackagePrice = trim($request->input('editPackagePrice'));
                    $sets->intPackageMinDays = trim($request->input('editPackageMinDays'));
                    $sets->strPackageDesc = trim($request->input('editPackageDesc'));
                    $sets->strPackageImage = 'imgPackages/'.$file;
                }           

                $sets->save();

            \Session::flash('flash_message_update','Set was successfully updated.'); //flash message    
         }else \Session::flash('flash_message_duplicate','Set already exists.'); //flash message    

            
            return redirect('maintenance/sets');
    }

    function delete_package(Request $request)
    {
        $sets = Package::find($request->input('delPackageID'));

        $sets->strPackageInactiveReason = trim($request->input('delInactivePackage'));
        $sets->boolIsActive = 0;
        $sets->save();


       \Session::flash('flash_message_delete','Set was successfully deactivated.'); //flash message

        return redirect('maintenance/sets');
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
