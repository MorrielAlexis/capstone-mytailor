<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SegmentPattern;
use App\GarmentCategory;
use App\GarmentSegment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SegmentPatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the segment pattern
        $category = GarmentCategory::all();

        $segment = GarmentSegment::all();

        $reason = SegmentPattern::all(); /*dummy lang wala pang model un reasons e*/

        $newID = 0;

        $pattern = SegmentPattern::all();
        
        //load the view and pass the pattern
        return view('designPattern')
                    ->with('pattern', $pattern)
                    ->with('category', $category)
                    ->with('segment', $segment)
                    ->with('reason', $reason)
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
}
