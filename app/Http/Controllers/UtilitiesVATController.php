<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\UtilitiesGeneral;
use App\UtilitiesVat;


class UtilitiesVATController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get all the fabric colors

        $ids = \DB::table('tblVat')
            ->select('intVatID')
            ->orderBy('created_at', 'desc')
            ->orderBy('intVatID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->intVatID;
        $newID = $this->smartCounter($ID);  
        $tax = UtilitiesVat::all();

        return view('utilities.utilities-VAT')
        ->with('tax', $tax);

    }

    public function updateVat(Request $request)
    {
        
        $tax = UtilitiesVat::find($request->input('editVatID'));

                $tax->strTaxName = trim($request->input('editTaxName'));    
                $tax->dblTaxPercentage = trim($request->input('editTaxPercent'));
                $tax->save();

            \Session::flash('flash_message_update','VAT successfully updated.');
         // }else \Session::flash('flash_message_duplicate','Color already exists.'); //flash message

        return redirect('maintenance/utilities-VAT');
        // dd($tax);

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
