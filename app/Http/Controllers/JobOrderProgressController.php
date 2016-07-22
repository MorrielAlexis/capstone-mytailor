<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobOrderProgressController extends Controller
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

        $joborder = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJo_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJo_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            ->get(); 

        // $specifics = \DB::table('tbljospecific')
        //     ->join('tbljoborder' , 'tbljoborder.strJobOrderID', '=', 'tbljospecific.strJobOrderFK')
        //     ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tbljospecific.strJOSegmentFK')
        //     ->join('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
        //     ->join('tblSegmentPattern', 'tblSegmentPattern.strSegPatternID', '=', 'tbljospecific.strJOSegmentPatternFK')
        //     ->leftjoin('tblJobOrderProgress', 'tblJobOrderProgress.strJobOrderSpecificFK', '=', "tbljospecific.strJOSpecificID")
        //     ->select('tbljospecific.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblSegment.strSegmentName', 'tblSegmentPattern.strSegPName')
        //     ->get(); 


              //dd($specifics);              

        return view('transaction-joborderprogress')
            ->with('joborder', $joborder);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jobdetails()
    {
      
        $specifics = \DB::table('tbljospecific')
            ->join('tbljoborder' , 'tbljoborder.strJobOrderID', '=', 'tbljospecific.strJobOrderFK')
            ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tbljospecific.strJOSegmentFK')
            ->join('tblGarmentCategory', 'tblGarmentCategory.strGarmentCategoryID', '=', 'tblSegment.strSegCategoryFK')
            ->join('tblSegmentPattern', 'tblSegmentPattern.strSegPatternID', '=', 'tbljospecific.strJOSegmentPatternFK')
            ->leftjoin('tblJobOrderProgress', 'tblJobOrderProgress.strJobOrderSpecificFK', '=', "tbljospecific.strJOSpecificID")
            ->where('tbljospecific.strJobOrderFK', '=', Input::get('jobID'))
            ->select('tbljospecific.*', 'tblGarmentCategory.strGarmentCategoryName', 'tblSegment.strSegmentName', 'tblSegmentPattern.strSegPName', 'tblJobOrderProgress.intProgressAmount', 'tbljoborder.strJobOrderID')
            ->get();    


            // dd($specifics);
        return response()->json(array(
            'job_order_details' => $specifics
        ));
    }

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
