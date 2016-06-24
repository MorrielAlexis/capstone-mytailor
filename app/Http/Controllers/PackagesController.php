<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

        $packages = \DB::table('tblPackages')
            ->join('tblSegment as tblSegment1', 'tblPackages.strPackageSeg1FK', '=', 'tblSegment1.strSegmentID')
            ->join('tblSegment as tblSegment2', 'tblPackages.strPackageSeg2FK', '=', 'tblSegment2.strSegmentID')
            ->join('tblSegment as tblSegment3', 'tblPackages.strPackageSeg3FK', '=', 'tblSegment3.strSegmentID')
            ->join('tblSegment as tblSegment4', 'tblPackages.strPackageSeg4FK', '=', 'tblSegment4.strSegmentID')
            ->join('tblSegment as tblSegment5', 'tblPackages.strPackageSeg5FK', '=', 'tblSegment5.strSegmentID')
            ->select('tblPackages.*', 'tblSegment1.strSegmentName as strSegmentName1','tblSegment2.strSegmentName as strSegmentName2','tblSegment3.strSegmentName as strSegmentName3','tblSegment4.strSegmentName as strSegmentName4','tblSegment5.strSegmentName as strSegmentName5')
            ->get();


        //load the view and pass the employees
        return view('maintenance-packages')
                    ->with('packages', $packages)
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
    public function store(Request $request)
    {
        $file = $request->input('addImage');
        $destinationPath = 'imgPackages';

            if($file == '' || $file == null){
                $packages = Package::create(array(
                 'strPackageID' => $request->input('addPackageID'),
                 'strPackageName' => trim($request->input('addPackageName')),
                 'strPackageSeg1FK' => $request->input('strPackageSeg1FK'),
                 'strPackageSeg2FK' => $request->input('strPackageSeg2FK'),
                 'strPackageSeg3FK' => $request->input('strPackageSeg3FK'),
                 'strPackageSeg4FK' => $request->input('strPackageSeg4FK'),
                 'strPackageSeg5FK' => $request->input('strPackageSeg5FK'),
                 'strPackageDesc' => trim($request->input('strPackageDesc')),
                'boolIsActive' => 1
                ));     
            }else{
                $request->file('addImg')->move($destinationPath, $file);

                $packages = Package::create(array(
                'strPackageID' => $request->input('addPackageID'),
                'strPackageName' => trim($request->input('addPackageName')),
                'strPackageSeg1FK' => $request->input('strPackageSeg1FK'),
                'strPackageSeg2FK' => $request->input('strPackageSeg2FK'),
                'strPackageSeg3FK' => $request->input('strPackageSeg3FK'),
                'strPackageSeg4FK' => $request->input('strPackageSeg4FK'),
                'strPackageSeg5FK' => $request->input('strPackageSeg5FK'),
                'strPackageDesc' => trim($request->input('strPackageDesc')),
                'strPackageImage' => 'imgPackages/'.$file,
                'boolIsActive' => 1
                )); 
                }

            $packages->save();

             \Session::flash('flash_message','Package successfully created.'); //flash message
            
            return redirect('/maintenance/packages');

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
         $packages = Package::find($request->input('editPackageID'));

        $file = $request->input('editImage');
        $destinationPath = 'imgPackages';

                if($file == $packages->strPackageImage)
                {
                    $packages->strPackageName = trim($request->input('editPackageName'));
                    $packages->strPackageSeg1FK = $request->input('editSegment1');
                    $packages->strPackageSeg2FK = $request->input('editSegment2');
                    $packages->strPackageSeg3FK = $request->input('editSegment3');
                    $packages->strPackageSeg4FK = $request->input('editSegment4');
                    $packages->strPackageSeg5FK = $request->input('editSegment5');
                    $packages->strPackageDesc = trim($request->input('editPackageDesc'));
                    
                }else{
                    $request->file('editImg')->move($destinationPath);

                    $packages->strPackageName = trim($request->input('editPackageName'));
                    $packages->strPackageSeg1FK = $request->input('editSegment1');
                    $packages->strPackageSeg2FK = $request->input('editSegment2');
                    $packages->strPackageSeg3FK = $request->input('editSegment3');
                    $packages->strPackageSeg4FK = $request->input('editSegment4');
                    $packages->strPackageSeg5FK = $request->input('editSegment5');
                    $packages->strPackageDesc = trim($request->input('editPackageDesc'));
                    $packages->strPackageImage = 'imgPackages/'.$file;
                }           

                $packages->save();

            \Session::flash('flash_message_update','Package successfully updated.'); //flash message      

            
            return redirect('maintenance/packages');
    }

    function delete_package(Request $request)
    {
        $packages = Package::find($request->input('delPackageID'));

        $packages->strPackageInactiveReason = trim($request->input('delInactivePackage'));
        $packages->boolIsActive = 0;
        $packages->save();


       \Session::flash('flash_message_delete','Package was successfully deactivated.'); //flash message

        return redirect('maintenance/packages');
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
