<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\UtilitiesGeneralModel;


class UtilitiesGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $utilities = UtilitiesGeneralModel::all();
        $shopLogo = \DB::table('tblUtilitiesGeneral')
            ->where('intUtilsGenID','GEN0001')
            ->orderBy('created_at', 'desc')
            ->pluck('strShopImage');

            Session::put('shoplogo', $shopLogo);

            $shopName = \DB::table('tblUtilitiesGeneral')
            ->where('intUtilsGenID', 'GEN0001')
            ->orderBy('created_at', 'desc')
            ->pluck('strShopName');

            Session::put('shopname', $shopName);

            return view('utilities.utilities-general');

            // ->select('strSegmentName')
            //         ->where('strSegmentID', $segment)
            //         ->pluck('segment');
    }

    public function general()
    {
        // $shopLogo = \DB::table('tblUtilitiesGeneral')
        //     ->where('intUtilsGenID','GEN0001')
        //     ->orderBy('created_at', 'desc')
        //     ->pluck('strShopImage');

        //     Session::put('shoplogo', $shopLogo);

        //     $shopName = \DB::table('tblUtilitiesGeneral')
        //     ->where('intUtilsGenID', 'GEN0001')
        //     ->orderBy('created_at', 'desc')
        //     ->pluck('strShopName');

        //     Session::put('shopname', $shopName);

        //     return redirect('utilities/utilities-general');
    }

    public function updateSettings(Request $request)
    {
        $utilities  = UtilitiesGeneralModel::find("GEN0001");
        $file = $request->input('updateLogo');
        $destinationPath = 'img';
          if($file == $utilities->strShopImage)
            {

                $utilities->strShopName = $request->input('updateShopName'); 
            }else{
                    $request->file('updateLogo')->move($destinationPath);
                    $utilities->strShopName = $request->input('updateShopName'); 
                    $utilities->strShopImage = 'img/'.$file;
            }
                $utilities->save();
                Session::put('shoplogo', $utilities);
                Session::put('shopname', $utilities);
                return redirect('utilities/utilities-general/update');
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
}
