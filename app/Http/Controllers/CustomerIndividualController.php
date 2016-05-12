<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('customerIndividual')
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
    public function store(Request $request)
    {
        $ind = Individual::get();

        $individual = Individual::create(array(
                    'strIndivID' => $request->input('addIndiID'),
                    'strIndivFName' => trim($request->input('addFName')),     
                    'strIndivMName' => trim($request->input('addMName')),
                    'strIndivLName' => trim($request->input('addLName')),
                    'strIndivHouseNo' => trim($request->input('addCustPrivHouseNo')), 
                    'strIndivStreet' => trim($request->input('addCustPrivStreet')),
                    'strIndivBarangay' => trim($request->input('addCustPrivBarangay')),   
                    'strIndivCity' => trim($request->input('addCustPrivCity')),   
                    'strIndivProvince' => trim($request->input('addCustPrivProvince')),
                    'strIndivZipCode' => trim($request->input('addCustPrivZipCode')),
                    'strIndivLandlineNumber' => trim($request->input('addPhone')),
                    'strIndivCPNumber' => trim($request->input('addCel')), 
                    'strIndivCPNumberAlt' => trim($request->input('addCelAlt')),
                    'strIndivEmailAddress' => trim($request->input('addEmail')),
                    'boolIsActive' => 1
                    ));

                $individual->save();

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

        return redirect('maintenance/individual');
    }

    function deleteIndividual(Request $request)
    {
        $individual = Individual::find($request->input('delIndivID'));

        $individual->boolIsActive = 0;
        $individual->save();

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
