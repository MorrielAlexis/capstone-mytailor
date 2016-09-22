<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\GarmentCategory;
use App\SegmentPattern;
use App\GarmentSegment; 
use App\Fabric; 
use App\Individual;
use App\Company;

use App\TransactionJobOrder;
use App\TransactionJobOrderSpecifics;
use App\TransactionJobOrderPayment;

class ApproveOnlineCustomerIndividualController extends Controller
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
        $onlineJO = \DB::table('tblJobOrder')
            ->leftjoin('tblcustindividual', 'tblJobOrder.strJO_CustomerFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblJobOrder.strJO_CustomerCompanyFK', '=', 'tblcustcompany.strCompanyID')
            ->orderby('tblJobOrder.strJobOrderID')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblJobOrder.*')
            // ->where('boolIsOnline', 1)
            ->get(); 


        $onlineJOSpecs = TransactionJobOrderSpecifics::with("onlineJobOrder")->get();

         $JOSpecs = \DB::table('tblJOSpecific')
            ->join('tblJobOrder', 'tblJobOrder.strJobOrderID', '=', 'tblJOSpecific.strJobOrderFK')
            ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tblJOSpecific.strJOSegmentFK')
            ->join('tblFabric', 'tblFabric.strFabricID', '=', 'tblJOSpecific.strJOFabricFK')
            ->orderby('tblJOSpecific.strJOSpecificID')
            ->select('tblJOSpecific.*', 'tblFabric.strFabricName', 'tblSegment.strSegmentName')
            ->get();   

            //dd($JOSpecs);

            //dd($onlineJO->strJobOrderID);
        return view('transaction-onlinecustomerindividual')
            ->with('onlineJO', $onlineJO)
            ->with('onlineJOSpecs', $JOSpecs);

            
    }

    public function accept()
    {
        //$email = 'arianne_spice@yahoo.com';
        $name = 'Arianne Labtic'; //name ng pagsesendan
        Mail::send('emails.accept-order', ['name' => $name], function($message) {
            $message->to('morriel.aquino@yahoo.com', 'Arianne Labtic')->subject('Hello!');

        });

         \Session::flash('flash_message','Order accepted! Email successfully sent to customer.'); //flash message

        return redirect('transaction/online-customer-individual');
    }

    public function reject()
    {

        $name = 'Morriel Aquino'; //name ng pagsesendan
        Mail::send('emails.reject-online-order', ['name' => $name], function($message) {
            $message->to('morriel.aquino@yahoo.com', 'Morriel Aquino')->subject('Hello!');

        });

         \Session::flash('flash_message_delete','Order rejected! Email successfully sent to customer.'); //flash message

        return redirect('transaction/online-customer-individual');
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
