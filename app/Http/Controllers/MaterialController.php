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

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function thread()
    {
        $thread = Thread::all();
        $reasonThread = Thread::all();
        $newThreadID = 0;

        return view('maintenance-material-thread')
                    ->with('threads', $thread)
                    ->with('reasonThread', $reasonThread)
                    ->with('newThreadID', $newThreadID);
    }

    public function needle()
    {       
        $needle = Needle::all();
        $reasonNeedle = Needle::all();
        $newNeedleID = 0;

        return view('maintenance-material-needle')
                    ->with('needles', $needle)
                    ->with('reasonNeedle', $reasonNeedle)
                    ->with('newNeedleID', $newNeedleID);
    }

    public function button()
    {   
        $button = Button::all();
        $reasonButton = Button::all();
        $newButtonID = 0;

        return view('maintenance-material-button')
                    ->with('buttons', $button)
                    ->with('reasonButton', $reasonButton)
                    ->with('newButtonID', $newButtonID);
    }
    public function zipper()
    {   
        $zipper = Zipper::all();
        $reasonZipper = Zipper::all();
        $newZipperID = 0;

        return view('maintenance-material-zipper')
                    ->with('zippers', $zipper)
                    ->with('reasonZipper', $reasonZipper)
                    ->with('newZipperID', $newZipperID);
    }
    public function hookandeye()
    {   
        $hook = HookAndEye::all();
        $reasonHook = HookAndEye::all();
        $newHookID = 0;

        return view('maintenance-material-hookandeye')
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
