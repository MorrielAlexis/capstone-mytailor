<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MeasurementCategory;
use App\GarmentCategory;
use App\GarmentSegment;
use App\MeasurementDetail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MeasurementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the category

        $category =  GarmentCategory::all();

        $segment = GarmentSegment::all();

        $detailList = MeasurementDetail::all();


        $reason = MeasurementCategory::all(); /*dummy lang wala pang model un reasons e*/


        $categoryNewID = 0;
        

        $head = MeasurementDetail::all();
       

        //load the view and pass the employees
        return view('measurementCategory')
                    ->with('head', $head)
                    ->with('category', $category)
                    ->with('segment', $segment)
                    ->with('detailList', $detailList)
                    ->with('reason', $reason)
                    ->with('categoryNewID', $categoryNewID);

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
