<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\Company;
use App\EmployeeRole;
use App\Employee;
use App\GarmentCategory;
use App\GarmentSegment;
use App\SegmentPattern;
use App\MeasurementCategory;
use App\MeasurementDetail;
use App\FabricType;
use App\Swatch;
use App\Thread;
use App\Needle;
use App\Button;
use App\Zipper;
use App\HookAndEye;
use App\Catalogue;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InactiveDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individual = Individual::all(); //temporary
        $company = Company::all();
        $role = EmployeeRole::all();
        $employee = Employee::all();
        $category = GarmentCategory::all();
        $segment = GarmentSegment::all();
        $pattern = SegmentPattern::all();
        $head = MeasurementCategory::all();
        $detail = MeasurementDetail::all();
        $fabricType = FabricType::all();
        $swatch = Swatch::all();
        $thread = Thread::all();
        $needle = Needle::all();
        $button = Button::all();
        $zipper = Zipper::all();
        $hook = HookAndEye::all();
        $catalogue = Catalogue::all();

        $newID = 0;

//$reason = Individual::all(); 


        return view('inactiveData')
            ->with('individual', $individual)
            ->with('company', $company)
            ->with('role', $role)
            ->with('employee', $employee)
            ->with('category', $category)
            ->with('segment', $segment)
            ->with('pattern', $pattern)
            ->with('head', $head)
            ->with('detail', $detail)
            ->with('fabricType', $fabricType)
            ->with('swatch', $swatch)
            ->with('thread', $thread)
            ->with('needle', $needle)
            ->with('button', $button)
            ->with('zipper', $zipper)
            ->with('hook', $hook)
            ->with('catalogue', $catalogue)

            //->with('reason', $reason)
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

    function reactivate_individual(Request $request)
    {
        $individual = Individual::find($request->input('reactID'));

      //  $reas = $request->input('reactInactiveID');
       //$indiv = \DB::table('tblCustIndividual')
           //     ->where('strIndivID', "=", $reas)
           //     ->delete();

       // $reason = Individual::where('strIndivID', '=', $reas)->update(['strIndivInactiveReason' => null]);

        $indiv = \DB::table('tblCustIndividual')->where('strIndivID', $individual)
                ->update(array($individual->strIndivInactiveReason => null));

        $individual->boolIsActive = 1;
        $individual->save();

        return redirect('utilities/inactive-data');
    }
}
