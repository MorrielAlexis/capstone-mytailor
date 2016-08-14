<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChargeDetailModel;
use App\GarmentSegment;
use App\ChargeCategoryModel;

use App\Http\Requests;
use App\Http\Requests\ChargeDetailRequest;
use App\Http\Controllers\Controller;

class ChargeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the labor charges

        $ids = \DB::table('tblChargeDetail')
            ->select('strChargeDetailID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strChargeDetailID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strChargeDetailID;
        $newID = $this->smartCounter($ID);  

        $segment = GarmentSegment::all();
        $chargeCat = ChargeCategoryModel::all();


        $chargeDetail = \DB::table('tblChargeDetail')
                ->join('tblSegment', 'tblChargeDetail.strChargeDetSegFK', '=', 'tblSegment.strSegmentID')
                ->join('tblChargeCategory', 'tblChargeDetail.strChargeCatFK', '=', 'tblChargeCategory.strChargeCatID')
                ->select('tblChargeDetail.*','tblSegment.strSegmentName', 'tblChargeCategory.strChargeCatName') 
                ->orderBy('strChargeDetailID')
                ->get();
        
        //load the view and pass the charges
       return view('maintenance-charge-detail')
                    ->with('chargeDetail', $chargeDetail)
                    ->with('segment', $segment)
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
    public function store(ChargeDetailRequest $request)
    {
        $chargeDetails = ChargeDetailModel::get();
            $chargeDetail = ChargeDetailModel::create(array(
                'strChargeDetailID' => $request->input('strChargeDetailID'),
                'strChargeCatFK' => $request->input('strChargeCatFK'),
                 'strChargeDetSegFK' => $request->input('strChargeDetSegFK'),
                'dblChargeDetPrice' => trim($request->input('dblChargeDetPrice')),
                'txtChargeDetDesc' => trim($request->input('txtChargeDetDesc')),
                'boolIsActive' => 1
                ));

         $added=$chargeDetail->save();
          

        \Session::flash('flash_message','Additional charge detail successfully added.'); //flash message

        return redirect('maintenance/charges-detail');
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

    function updatechargeDetail(Request $request)
    {
        $checkchargeDetails = ChargeDetailModel::all();
        $isAdded=FALSE;

        foreach($checkchargeDetails as $checkchargeDetail)
            if(!strcasecmp($checkchargeDetail->strChargeDetailID, $request->input('editChargeDetID')) == 0 && strcasecmp($checkchargeDetail->strChargeCatFK,$request->input('editChargeCatFK')) == 0 &&  strcasecmp($checkchargeDetail->strChargeDetSegFK,$request->input('editChargeDetSegFK')) == 0)
                // &&
                // strcasecmp($checkchargeDetail->dblChargeDetPrice, trim($request->input('editChargeDetPrice'))) == 0
                $isAdded = TRUE;

        if(!$isAdded){   
        $chargeDetail  = ChargeDetailModel::find($request->input('editChargeDetID'));

            $chargeDetail ->strChargeCatFK = $request->input('editChargeCatFK');
            $chargeDetail ->strChargeDetSegFK = $request->input('editChargeDetSegFK');
            $chargeDetail ->dblChargeDetPrice = trim($request->input('editChargeDetPrice'));
            $chargeDetail ->txtChargeDetDesc = trim($request->input('editChargeDetDesc'));

            $chargeDetail  ->save();

        \Session::flash('flash_message_update','Additional chrage detail/s successfully updated.'); //flash message
        }else \Session::flash('flash_message_duplicate','Charge detail already exists.'); //flash message

        return  redirect('maintenance/charges-detail');
    }

    function deletechargeDetail(Request $request)
    {
        $chargeDetail = ChargeDetailModel::find($request->input('delChargeDetID'));

        $chargeDetail->strChargeDetInactiveReason = trim($request->input('delInactiveChargeDet'));
        $chargeDetail->boolIsActive = 0;
        $chargeDetail->save();


       \Session::flash('flash_message_delete','Charge detail successfully deactivated.'); //flash message

        return redirect('maintenance/charges-detail');
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
