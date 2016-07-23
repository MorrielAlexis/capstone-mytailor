<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use Session;
use DB;

use App\TransactionJobOrder;
use App\TransactionJobOrderPayment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillingPaymentController extends Controller
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

   

    function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE)
    {
         require_once("dompdf/dompdf_config.inc.php");
        spl_autoload_register('DOMPDF_autoload');

        $dompdf = new DOMPDF();
        $dompdf->set_paper($paper,$orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream($filename.".pdf");

        $filename = 'nama_file';
        $dompdf = new DOMPDF();
        $html = file_get_contents('file_html.php'); 
        pdf_create($html,$filename,'A4','portrait');
    }

    
    public function index()
    {
        $types = "";
        return view('transaction-billingpayment')
                ->with('types', $types);
    }

    public function search(Request $request)
    {
        $search_query = $request->input('search_query');
        $types = $request->input('customer_type');


        $customers = \DB::table('tblCustIndividual AS a')
                    ->select(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'))
                    ->where(\DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName)'), $search_query)
                    ->get();
        

        $pending_payments = \DB::table('tblJOPayment AS a')
                    ->leftJoin('tblJobOrder AS b', 'a.strTransactionFK', '=', 'b.strJobOrderID')
                    ->leftJoin('tblCustIndividual AS c', 'b.strJO_CustomerFK', '=', 'c.strIndivID')
                    ->select('a.*', 'b.*', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'))
                    ->where(\DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName)'), $search_query)
                    ->where('a.strPaymentStatus', 'Pending')
                    ->get();

        //$order_ids = TransactionJobOrder::all();
        
        for($i = 0; $i < count($pending_payments); $i++){
            $or_summary = \DB::table('tblJOSpecific AS a')
                        ->leftJoin('tblJobOrder AS b', 'a.strJobOrderFK', '=', 'b.strJobOrderID')
                        ->leftJoin('tblSegment AS c', 'a.strJOSegmentFK', '=', 'c.strSegmentID')
                        ->leftJoin('tblGarmentCategory AS d', 'c.strSegCategoryFK', '=', 'd.strGarmentCategoryID')
                        ->select('a.*', 'b.*', 'c.*', 'd.strGarmentCategoryName')
                        ->where('b.strJobOrderID', $pending_payments[$i]->strTransactionFK)
                        ->get();
        }
        

        return view('transaction-billingpayment')
                ->with('customers', $customers)
                ->with('types', $types)
                ->with('pending_payments', $pending_payments)
                ->with('or_summary', $or_summary);
                //->with('order_ids', $order_ids);
    }

    public function generateBill()
    {


        $pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        $pdf = PDF::loadView('/pdf/pendingPaymentPDF');

        return $pdf->stream();

    }

    public function generateReceipt()
    {


        $pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        $pdf = PDF::loadView('/pdf/paymentReceiptPDF');

        return $pdf->stream();

    }

    public function billCustomer(Request $request)
    {
        
        $ids = \DB::table('tblCustIndividual AS a')
            ->leftJoin('tblJobOrder AS b', 'b.strJO_CustomerFK', '=', 'a.strIndivID')
            ->leftJoin('tblJOPayment AS c', 'c.strTransactionFK', '=', 'b.strJobOrderID')
            ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS custname'))
            ->where('b.strJO_CustomerFK', 'a.strIndivID')
            ->where('c.strTransactionFK', 'b.strJobOrderID')
            ->get();


        if($ids == null){
            $custID = $this->smartCounter("CUSTP000"); 
        }else{
            $ID = $ids["0"]->strIndivID;
            $custID = $this->smartCounter($ID);  
        } 

        session(['custID' => $custID]);



        return view('transaction-billingpayment-billcustomer')
                ->with('custID', $custID);
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

    public function smartCounter($id)
    {   

        $lastID = str_split($id);

        $ctr = 0;
        $tempID = "";
        $tempNew = [];
        $newID = "";
        $add = TRUE;

        for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

            $tempID = $lastID[$ctr];

            if($add){
                if(is_numeric($tempID) || $tempID == '0'){
                    if($tempID == '9'){
                        $tempID = '0';
                        $tempNew[$ctr] = $tempID;

                    }else{
                        $tempID = $tempID + 1;
                        $tempNew[$ctr] = $tempID;
                        $add = FALSE;
                    }
                }else{
                    $tempNew[$ctr] = $tempID;
                }           
            }
            $tempNew[$ctr] = $tempID;   
        }

        
        for($ctr = 0; $ctr < count($lastID); $ctr++){
            $newID = $newID . $tempNew[$ctr];
        }

        return $newID;
    }
}
