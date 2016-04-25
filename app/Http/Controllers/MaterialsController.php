<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread;
use App\Needle;
use App\Button;
use App\Zipper;
use App\HookAndEye;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thread = Thread::all();
        $needle = Needle::all();
        $button = Button::all();
        $zipper = Zipper::all();
        $hook = HookAndEye::all();

        $reasonThread = Thread::all();
        $reasonNeedle = Needle::all();
        $reasonButton = Button::all();
        $reasonZipper = Zipper::all();
        $reasonHook = HookAndEye::all();

        $newThreadID = 0;
        $newNeedleID =0;
        $newButtonID = 0;
        $newZipperID = 0;
        $newHookID = 0;

        return view('fabricAndMaterialsMaterials')
                    ->with('threads', $thread)
                    ->with('reasonThread', $reasonThread)
                    ->with('newThreadID', $newThreadID)
                    ->with('needles', $needle)
                    ->with('reasonNeedle', $reasonNeedle)
                    ->with('newNeedleID', $newNeedleID)
                    ->with('buttons', $button)
                    ->with('reasonButton', $reasonButton)
                    ->with('newButtonID', $newButtonID)
                    ->with('zippers', $zipper)
                    ->with('reasonZipper', $reasonZipper)
                    ->with('newZipperID', $newZipperID)
                    ->with('hooks', $hook)
                    ->with('reasonHook', $reasonHook)
                    ->with('newHookID', $newHookID);
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
