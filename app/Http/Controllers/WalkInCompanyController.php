<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Package;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\Segment;
use App\SegmentPattern;
use App\SegmentStyle;


class WalkInCompanyController extends Controller
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
        $packages = Package::all();

        return view('transaction-walkin-company')
                ->with('packages', $packages);
    }

    public function showOrder()
    {   
        $values = \DB::table('tblPackages')
                ->select('strPackageID', 'strPackageName', 'strPackageSex', 'strPackageSeg1FK', 
                    'strPackageSeg2FK', 'strPackageSeg3FK', 'dblPackagePrice', 'strPackageImage', 
                    'intPackageMinDays', 'strPackageDesc', 'boolIsActive')
                ->whereIn('strPackageID', session()->get('package_values'))
                ->get();

        return view('walkin-company-customize-order')
                ->with('values', $values);
    }

    public function listOfOrders(Request $request)
    {   
        $data_segment = $request->input('cbx-package-name');

        session(['package_values' => $data_segment]);

        return redirect('transaction/walkin-company-show-order');
    }

    public function showCustomizeOrder()
    {   
        $to_be_customized = session()->get('package_customize');

        $segment1 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg1FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segment2 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg2FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segment3 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg3FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segments = [$segment1, $segment2, $segment3];

        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();

        $segmentPatterns = SegmentPattern::all();
        $segmentStyles = SegmentStyle::all();

        $package = \DB::table('tblPackages')
                ->select('*')
                ->where('strPackageID', $to_be_customized)
                ->get();

        return view('walkin-company-customize-order-package')
                ->with('segments', $segments)
                ->with('package', $package)
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $segmentPatterns)
                ->with('styles', $segmentStyles);
    }

    public function customize(Request $request)
    {   
        $to_be_customized = $request->input('hidden-package-id');
        session(['package_customize' => $to_be_customized]);

        return redirect('transaction/walkin-company-show-customize');
    }

    public function retailProduct()
    {
        return view('walkin-company-retail-product');
    }

    public function catalogueDesign()
    {
        return view('walkin-company-catalogue-design');
    }

    public function information()
    {
        return view('walkin-company-checkout-info');
    }

    public function addEmployee()
    {
        return view('walkin-company-add-employee');
    }
 
    public function payment()
    {
        return view('walkin-company-checkout-pay');

    }

    public function measurement()
    {
        return view('walkin-company-checkout-measure');
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
