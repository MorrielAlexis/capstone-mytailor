<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\Http\Requests;
use App\Http\Requests\MaintenanceCustomerIndividualRequest;
use App\Http\Controllers\Controller;

class CustomerIndividualController extends Controller
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
        //get all the individuals
        $ids = \DB::table('tblCustIndividual')
            ->select('strIndivID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strIndivID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strIndivID;
        $newID = $this->smartCounter($ID);  

        $individual = Individual::all();
        
        //load the view and pass the individuals
        return view('maintenance-customer-individual')
                    ->with('individual', $individual)
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
    public function store(MaintenanceCustomerIndividualRequest $request)
    {
        $ind = Individual::get();

        $individual = Individual::create(array(
                    'strIndivID' => $request->input('strIndivID'),
                    'strIndivFName' => trim($request->input('strIndivFName')),     
                    'strIndivMName' => trim($request->input('strIndivMName')),
                    'strIndivLName' => trim($request->input('strIndivLName')),
                    'strIndivHouseNo' => trim($request->input('strIndivHouseNo')), 
                    'strIndivStreet' => trim($request->input('strIndivStreet')),
                    'strIndivBarangay' => trim($request->input('strIndivBarangay')),   
                    'strIndivCity' => trim($request->input('strIndivCity')),   
                    'strIndivProvince' => trim($request->input('strIndivProvince')),
                    'strIndivZipCode' => trim($request->input('strIndivZipCode')),
                    'strIndivLandlineNumber' => trim($request->input('strIndivLandlineNumber')),
                    'strIndivCPNumber' => trim($request->input('strIndivCPNumber')), 
                    'strIndivCPNumberAlt' => trim($request->input('strIndivCPNumberAlt')),
                    'strIndivEmailAddress' => trim($request->input('strIndivEmailAddress')),
                    'boolIsActive' => 1
                    ));

                $individual->save();

         \Session::flash('flash_message','Customer successfully added.');

        return redirect('maintenance/individual');
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

    function updateIndividual(Request $request)
    {   
        $individual = Individual::find($request->input('editIndiID'));
        $checkIndividuals = Individual::all();
        $isAdded=FALSE;
        $count = 0; 
        $count2 = 0;

        if(!($individual->strIndivEmailAddress == trim($request->input('editEmail')))) {    
            $count = \DB::table('tblCustIndividual')
                ->select('tblCustIndividual.strIndivEmailAddress')
                ->where('tblCustIndividual.strIndivEmailAddress','=', trim($request->input('editEmail')))
                ->count();
        }

        if(!($individual->strIndivCPNumber == trim($request->input('editCel')))) { 
            $count2 = \DB::table('tblCustIndividual')
                ->select('tblCustIndividual.strIndivCPNumber')
                ->where('tblCustIndividual.strIndivCPNumber','=', trim($request->input('editCel')))
                ->count();
        }
            if($count > 0 || $count2 > 0){
            $isAdded = TRUE;

        }



            foreach($checkIndividuals as $ind)
            if(!strcasecmp($ind->strIndivID, $request->input('editIndiID')) == 0 &&
                strcasecmp($ind->strIndivFName, trim($request->input('editFName'))) == 0 &&
                strcasecmp($ind->strIndivMName, trim($request->input('editMName'))) == 0 &&
                strcasecmp($ind->strIndivLName, trim($request->input('editLName'))) == 0)
                 $isAdded = TRUE;   
            

        if(!$isAdded){

        $individual->strIndivFName = trim($request->input('editFName'));
        $individual->strIndivMName = trim($request->input('editMName'));  
        $individual->strIndivLName = trim($request->input('editLName'));
        $individual->strIndivHouseNo = trim($request->input('editCustPrivHouseNo'));
        $individual->strIndivStreet = trim($request->input('editCustPrivStreet'));
        $individual->strIndivBarangay = trim($request->input('editCustPrivBarangay'));
        $individual->strIndivCity = trim($request->input('editCustPrivCity'));
        $individual->strIndivProvince = trim($request->input('editCustPrivProvince'));
        $individual->strIndivZipCode = trim($request->input('editCustPrivZipCode'));
        $individual->strIndivEmailAddress = trim($request->input('editEmail'));           
        $individual->strIndivCPNumber = trim($request->input('editCel'));
        $individual->strIndivCPNumberAlt = trim($request->input('editCelAlt'));
        $individual->strIndivLandlineNumber = trim($request->input('editPhone'));

        $individual->save();

         \Session::flash('flash_message_update','Customer detail/s successfully updated.');
        }else \Session::flash('flash_message_duplicate','Employee profile already exists.'); //flash message

        return redirect('maintenance/individual');
    }

    function deleteIndividual(Request $request)
    {
        $individual = Individual::find($request->input('delIndivID'));

        $individual->strIndivInactiveReason = trim($request->input('delInactiveReason'));
        $individual->boolIsActive = 0;
        $individual->save();

         \Session::flash('flash_message_delete','Customer successfully deactivated.');

        return redirect('maintenance/individual');
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
