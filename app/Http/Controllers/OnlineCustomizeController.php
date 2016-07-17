<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OnlineCustomizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fabricsuit()
    {
        return view('customize.suit-fabric');
    }

    public function stylesuit()
    {
        return view('customize.suit-style');
    }    

    public function fabricgown()
    {
        return view('customize.gown-fabric');
    }

    public function stylegown()
    {
        return view('customize.gown-style');
    }

    public function fabricmens()
    {
        return view('customize.mens-fabric');
    }

    public function stylemens()
    {
        return view('customize.mens-style');
    }

    public function fabricwomens()
    {
        return view('customize.womens-fabric');
    }

    public function stylewomens()
    {
        return view('customize.womens-style');
    }

    public function fabricpants()
    {
        return view('customize.pants-fabric');
    }    

    public function stylepants()
    {
        return view('customize.pants-style');
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
