<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use Mail;

use App\GarmentCategory;
use App\SegmentPattern;
use App\GarmentSegment; 
use App\Alteration; 
use App\Individual;
use App\Company;

use App\TransactionJOAlteration;
use App\TransactionNonShopAlteration;
use App\TransactionNonShopAlterationSpecifics;

class AcceptAlterationOnlineController extends Controller
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
        
        $onlineAlteration = \DB::table('tblNonShopAlteration')
            ->leftjoin('tblcustindividual', 'tblNonShopAlteration.strCustIndFK', '=', 'tblcustindividual.strIndivID')
            ->leftjoin('tblcustcompany', 'tblNonShopAlteration.strCustCompFK', '=', 'tblcustcompany.strCompanyID')
            // ->where('boolisOnline','=', 1)
            ->orderby('tblNonShopAlteration.strNonShopAlterID')
            ->select('tblcustindividual.*', 'tblcustcompany.*', 'tblNonShopAlteration.*')
            ->where('boolIsOnline', 1)
            ->get(); 
        

        $specifics = TransactionNonShopAlterationSpecifics::with("alterationNonShop")->get();

         $onlineAltSpecifics = \DB::table('tblNonShopAlterSpecific')
            ->join('tblNonShopAlteration', 'tblNonShopAlteration.strNonShopAlterID', '=', 'tblNonShopAlterSpecific.strNonShopAlterFK')
            ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tblNonShopAlterSpecific.strGarmentSegmentFK')
            ->join('tblAlteration', 'tblAlteration.strAlterationID', '=', 'tblNonShopAlterSpecific.strAlterationTypeFK')
            // ->where('tblNonShopAlterSpecific.strNonShopAlterFK', '=', Input::get('jobID'))
            ->orderby('tblNonShopAlterSpecific.strNonAlterSpecificID')
            ->select('tblNonShopAlterSpecific.*', 'tblAlteration.strAlterationName', 'tblSegment.strSegmentName', 'tblNonShopAlteration.strNonShopAlterID')
            ->get();   

        return view('alteration.accept-online-alteration')
            ->with('onlineAlteration', $onlineAlteration)
            ->with('specifics', $onlineAltSpecifics);       
    }



    public function alterationDetails()
    {
        $onlineAlteration = TransactionNonShopAlteration::all();
        $onlineAltSpecifics = \DB::table('tblNonShopAlterSpecific')
            ->join('tblNonShopAlteration', 'tblNonShopAlteration.strNonShopAlterID', '=', 'tblNonShopAlterSpecific.strNonShopAlterFK')
            ->join('tblSegment', 'tblSegment.strSegmentID', '=', 'tblNonShopAlterSpecific.strGarmentSegmentFK')
            ->join('tblAlteration', 'tblAlteration.strAlterationID', '=', 'tblNonShopAlterSpecific.strAlterationTypeFK')
            // ->where('tblNonShopAlterSpecific.strNonShopAlterFK', '=', Input::get('jobID'))
            ->orderby('tblNonShopAlterSpecific.strNonAlterSpecificID')
            ->select('tblNonShopAlterSpecific.*', 'tblAlteration.strAlterationName', 'tblSegment.strSegmentName', 'tblNonShopAlteration.strNonShopAlterID')
            ->get();        

            
        return redirect('transaction/alteration-online-transaction-details')
               ->with('onlineAlteration', $onlineAlteration)
               ->with('onlineAltSpecifics', $onlineAltSpecifics);
           
    }



    public function accept(Request $request)
    {           

            //actual fetching from database

            $results = \DB::table('tblNonShopAlteration AS a')
                    ->join('tblCustIndividual AS b', 'a.strCustIndFK', '=', 'b.strIndivID')
                    ->join('tblNonShopAlterSpecific as c','a.strNonShopAlterID',  '=' , 'c.strNonShopAlterFK')
                    ->join('tblSegment as d', 'c.strGarmentSegmentFK', '=' , 'd.strSegmentID')
                    ->join('tblAlteration as e', 'c.strAlterationTypeFK', '=' , 'e.strAlterationID')
                    ->select(\DB::raw('CONCAT(b.strIndivFName, " " , b.strIndivMName, " " , b.strIndivLName) as custName'), 'a.strNonShopAlterID as transID', 'a.dblOrderTotalPrice AS totalPrice', 'b.strIndivEmailAddress AS custEmail', 'b.strIndivCPNumber AS cpNo', 'd.strSegmentName as segment', 'e.strAlterationName as alteration')
                    ->where('b.strIndivID', $request->input('customerID'))
                    ->get();
/*            var_dump($results);
            dd("");
*/

            foreach( $results as $result){
                $name = $result->custName;
                $order = $result->transID;
                $totPrice = $result->totalPrice;
                $email = $result->custEmail;
                $cpNo = $result->cpNo;
                $segment = $result->segment;
                $alteration = $result->alteration;
            }



        Mail::send('emails.accept-online-alteration', ['name' => $name, 'order' => $order, 'totPrice' => $totPrice, 'email' => $email, 'cp' => $cpNo, 'segment' => $segment, 'alteration' => $alteration], function($message) use($results) {

                foreach($results as $value){
                    $email = $value->custEmail;  
                    break;
                }

                $message->to("$email")->subject('Order Confirmation!'); //sending of email to selected customer
     
        });

         \Session::flash('flash_message','Order accepted! Email successfully sent to customer.'); //flash message

        return redirect('transaction/alteration-online-transaction');
    }

    public function reject()
    {

        $name = 'Morriel Aquino'; //name ng pagsesendan
        Mail::send('emails.reject-online-alteration', ['name' => $name], function($message) {
            $message->to('morriel.aquino@yahoo.com', 'Morriel Aquino')->subject('Order Confirmation!');

        });

         \Session::flash('flash_message_delete','Order rejected! Email successfully sent to customer.'); //flash message

        return redirect('transaction/alteration-online-transaction');
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
