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
use App\SegmentStyle;
use App\MeasurementCategory;
use App\MeasurementDetail;
use App\FabricType;
use App\Thread;
use App\Needle;
use App\Button;
use App\Zipper;
use App\HookAndEye;
use App\Catalogue;
use App\Alteration;
use App\Package;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InactiveDataController extends Controller
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
        $individual = Individual::all(); //temporary
        $company = Company::all();
        $role = EmployeeRole::all();
        $employee = Employee::all();
        $category = GarmentCategory::all();
        $segment = GarmentSegment::all();
        $pattern = SegmentPattern::all();
        $segmentStyle = SegmentStyle::all();
        $measurementCategory = MeasurementCategory::all();
        $detail = MeasurementDetail::all();
        $fabricType = FabricType::all();
        $thread = Thread::all();
        $needle = Needle::all();
        $button = Button::all();
        $zipper = Zipper::all();
        $hook = HookAndEye::all();
        $catalogue = Catalogue::all();
        $alteration = Alteration::all();
        $packages = Package::all();

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
            ->with('segmentStyle', $segmentStyle)
            ->with('measurementCategory', $measurementCategory)
            ->with('detail', $detail)
            ->with('fabricType', $fabricType)
            ->with('thread', $thread)
            ->with('needle', $needle)
            ->with('button', $button)
            ->with('zipper', $zipper)
            ->with('hook', $hook)
            ->with('catalogue', $catalogue)
            ->with('alteration', $alteration)
            ->with('packages', $packages)

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

        $individual->strIndivInactiveReason = null;

        $individual->boolIsActive = 1;
        $individual->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_company(Request $request)
    {
        $company = Company::find($request->input('reactID'));

        $company->strCompanyInactiveReason = null;

        $company->boolIsActive = 1;
        $company->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_emprole(Request $request)
    {
        $role = EmployeeRole::find($request->input('reactID'));

        $role->strRoleInactiveReason = null;

        $role->boolIsActive = 1;
        $role->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_employee(Request $request)
    {
        $employee = Employee::find($request->input('reactID'));

      //  $reas = $request->input('reactInactiveID');
       // $indiv = \DB::table('tblCustIndividual')
               // ->where('strIndivID', $individual)
              //  ->update(array($individual->strIndivInactiveReason => null));
        $employee->strEmpInactiveReason = null;

        $employee->boolIsActive = 1;
        $employee->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_catalogue(Request $request)
    {
        $catalogue = Catalogue::find($request->input('reactID'));

      //  $reas = $request->input('reactInactiveID');
       // $indiv = \DB::table('tblCustIndividual')
               // ->where('strIndivID', $individual)
              //  ->update(array($individual->strIndivInactiveReason => null));
        $catalogue->strCatalogueInactiveReason = null;

        $catalogue->boolIsActive = 1;
        $catalogue->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_alteration(Request $request)
    {
        $alteration = Alteration::find($request->input('reactID'));

      //  $reas = $request->input('reactInactiveID');
       // $indiv = \DB::table('tblCustIndividual')
               // ->where('strIndivID', $individual)
              //  ->update(array($individual->strIndivInactiveReason => null));
        $alteration->strAlterationInactiveReason = null;

        $alteration->boolIsActive = 1;
        $alteration->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_category(Request $request)
    {
        $category = GarmentCategory::find($request->input('reactID'));

        $category->strGarmentCategoryInactiveReason = null;

        $category->boolIsActive = 1;
        $category->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_segment(Request $request)
    {
        $segment = GarmentSegment::find($request->input('reactID'));

        $segment->strSegInactiveReason = null;

        $segment->boolIsActive = 1;
        $segment->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_segmentStyle(Request $request)
    {
        $segmentStyle = SegmentStyle::find($request->input('reactID'));

        $segmentStyle->strSegStyleCatInactiveReason = null;

        $segmentStyle->boolIsActive = 1;
        $segmentStyle->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_segmentpattern(Request $request)
    {
        $pattern = SegmentPattern::find($request->input('reactID'));

        $pattern->strSegPInactiveReason = null;

        $pattern->boolIsActive = 1;
        $pattern->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_measCategory(Request $request)
    {
        $measurementCategory = MeasurementCategory::find($request->input('reactID'));
        $measurementCategory->strMeasCatInactiveReason = null;

        $measurementCategory->boolIsActive = 1;
        $measurementCategory->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_detail(Request $request)
    {
        $detail = MeasurementDetail::find($request->input('reactID'));
        $detail->strMeasDetInactiveReason = null;

        $detail->boolIsActive = 1;
        $detail->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_fabrictype(Request $request)
    {
        $fabricType = FabricType::find($request->input('reactID'));
        $fabricType->strFabricTypeInactiveReason = null;

        $fabricType->boolIsActive = 1;
        $fabricType->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_swatch(Request $request)
    {
        $swatch = Swatch::find($request->input('reactID'));

        $swatch->strSwatchInactiveReason = null;

        $swatch->boolIsActive = 1;
        $swatch->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_swatchname(Request $request)
    {
        $swatchname = SwatchNameMaintenance::find($request->input('reactID'));

        $swatchname->strSwatchNameInactiveReason = null;

        $swatchname->boolIsActive = 1;
        $swatchname->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_thread(Request $request)
    {
        $thread = Thread::find($request->input('reactID'));

      //  $reas = $request->input('reactInactiveID');
       // $indiv = \DB::table('tblCustIndividual')
               // ->where('strIndivID', $individual)
              //  ->update(array($individual->strIndivInactiveReason => null));
        $thread->strThreadInactiveReason = null;

        $thread->boolIsActive = 1;
        $thread->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_needle(Request $request)
    {
        $needle = Needle::find($request->input('reactID'));

        $needle->strNeedleInactiveReason = null;

        $needle->boolIsActive = 1;
        $needle->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_button(Request $request)
    {
        $button = Button::find($request->input('reactID'));

        $button->strButtonInactiveReason = null;

        $button->boolIsActive = 1;
        $button->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_zipper(Request $request)
    {
        $zipper = Zipper::find($request->input('reactID'));
        $zipper->strZipperInactiveReason = null;

        $zipper->boolIsActive = 1;

        $zipper->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_hookeye(Request $request)
    {
        $hook = HookAndEye::find($request->input('reactID'));
        $hook->strHookInactiveReason = null;

        $hook->boolIsActive = 1;
        $hook->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }

    function reactivate_package(Request $request)
    {
        $packages = Package::find($request->input('reactID'));
        
        $packages->strPackageInactiveReason = null;

        $packages->boolIsActive = 1;
        
        $packages->save();

        \Session::flash('flash_message_inactive','Record was successfully reactivated.'); //flash message

        return redirect('utilities/inactive-data');
    }
}
