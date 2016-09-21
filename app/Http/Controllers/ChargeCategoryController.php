<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChargeCategoryModel;



use App\Http\Requests;
use App\Http\Requests\ChargeCategoryRequest;
use App\Http\Controllers\Controller;

class ChargeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get all the labor charges

        $ids = \DB::table('tblChargeCategory')
            ->select('strChargeCatID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strChargeCatID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strChargeCatID;
        $newID = $this->smartCounter($ID);  

        $chargeCat = ChargeCategoryModel::all();
        
        //load the view and pass the charges
       return view('maintenance.maintenance-charge-category')
                    ->with('chargeCat', $chargeCat)
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
    public function store(ChargeCategoryRequest $request)
    {
        $chargeCats = ChargeCategoryModel::get();

            $chargeCat = ChargeCategoryModel::create(array(
            'strChargeCatID' => $request->input('strChargeCatID'),
            'strChargeCatName' => trim($request->input('strChargeCatName')),
            'txtChargeDesc' => trim($request->input('txtChargeDesc')),
            'boolIsActive' => 1
            ));

            $chargeCat->save();


        \Session::flash('flash_message',' Charge category successfully added.');

        return redirect('maintenance/charges-category');
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

    function updateChargeCat(Request $request)
    {
        $checkchargeCats = ChargeCategoryModel::all();
        $isAdded=FALSE;

        foreach($checkchargeCats as $checkchargeCat)
            if(!strcasecmp($checkchargeCat->strChargeCatID, $request->input('editChargeCatID')) == 0 && strcasecmp($checkchargeCat->strChargeCatName,$request->input('editChargeCatName')) == 0)
                 // &&  strcasecmp($checkchargeCat->strChargeDetSegFK,$request->input('editChargeDetSegFK')) == 0
                $isAdded = TRUE;

        if(!$isAdded){
         $chargeCat = ChargeCategoryModel::find($request->input('editChargeCatID'));

                $chargeCat->strChargeCatName = trim($request->get('editChargeCatName'));    
                $chargeCat->txtChargeDesc = trim($request->get('editChargeCatDesc'));

                $chargeCat->save();

        \Session::flash('flash_message_update','Charge category successfully updated.');
        }else \Session::flash('flash_message_duplicate','Charge category already exists.'); //flash message

        return redirect('maintenance/charges-category');
    }

    function deleteChargeCat(Request $request)
    {
        $id = $request->input('delChargeCatID');
            $chargeCat = ChargeCategoryModel::find($request-> input('delChargeCatID'));

            $chargeCat->strChargeCatInactiveReason = trim($request->input('delInactiveChargeCat'));
            $chargeCat->boolIsActive = 0;
            $chargeCat->save();

        \Session::flash('flash_message_delete','Charge category successfully deactivated.');

        return redirect('maintenance/charges-category');

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
