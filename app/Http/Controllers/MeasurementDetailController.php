<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MeasurementDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MeasurementDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the measurement detail
        $detail = MeasurementDetail::all();
        $reason = MeasurementDetail::all(); /*dummy lang wala pang model un reasons e*/

        $newID = 0;
        
        //load the view and pass the individuals
        return view('measurementDetail')
                    ->with('detail', $detail)
                    ->with('reason', $reason)
                    ->with('newID', $newID);
    }
}
