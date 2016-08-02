<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OnlineCustomerProfileIndividualController extends Controller
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
        return view('customerprofile.individual');
    }

    public function measure()
    {
        return View::make('customerprofile.individual-measurement-details');
    }
    
    public function order()
    {
        return view('customerprofile.individual-order-details');
    }

    public function tracking()
    {
        //  $tracks = \DB::table('tbljospecific')
        //     ->join('tbljoborder' , 'tbljoborder.strJobOrderID', '=', 'tbljospecific.strJobOrderFK')
        //     ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tbljospecific.strJOSegmentFK')
        //     ->join('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
        //     ->leftjoin('tblJobOrderProgress', 'tblJobOrderProgress.strJobOrderSpecificFK', '=', "tbljospecific.strJOSpecificID")
        //     ->where('tbljospecific.strJobOrderFK', '=', "JO001")
        //     ->select('tbljospecific.*', 'tblJobOrder.dtOrderDate', 'tblGarmentCategory.strGarmentCategoryName', 'tblSegment.strSegmentName', 'tblJobOrderProgress.intProgressAmount')
        //     ->get(); 

        // dd($tracks);    
        return view('customerprofile.individual-order-tracking');
    }

    public function trackJob()
    {
         $tracks = \DB::table('tbljospecific')
            ->join('tbljoborder' , 'tbljoborder.strJobOrderID', '=', 'tbljospecific.strJobOrderFK')
            ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tbljospecific.strJOSegmentFK')
            ->join('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
            ->leftjoin('tblJobOrderProgress', 'tblJobOrderProgress.strJobOrderSpecificFK', '=', "tbljospecific.strJOSpecificID")
            ->where('tbljospecific.strJobOrderFK', '=', Input::get('trackID'))
            ->select('tbljospecific.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblJobOrder.*', 'tblSegment.strSegmentName', 'tblJobOrderProgress.intProgressAmount')
            ->get();        


            // dd($specifics);
        return response()->json(array(
            'track_details' => $tracks
        ));
    }

    public function pay()
    {
        return view('customerprofile.individual-payment-history');
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
