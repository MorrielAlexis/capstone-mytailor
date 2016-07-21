<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Package;

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
                ->select('*')
                ->whereIn('strPackageID', session()->get('segment_values'))
                ->get();

        return view('walkin-company-customize-order')
                ->with('values', $values);
    }

    public function customize(Request $request)
    {   
        $data_segment = $request->input('cbx-package-name');
        $data_quantity = array_slice(array_filter($request->input('int-package-qty')), 0);

        session(['segment_values' => $data_segment]);

        return redirect('transaction/walkin-company-show-order');
    }

    public function retailProduct()
    {
        return view('walkin-company-retail-product');
    }

    public function customPackage()
    {
        return view('walkin-company-customize-order-package');
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
