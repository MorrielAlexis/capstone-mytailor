<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function converToPdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('
                <html>
                    <head align="center">
                        <title>Fashion Collection</title>
                        <div style="background-color:teal">
                        <center><h1 style="color:white"><b>MyTailor</b> Store</h1></center>
                        <center><h3 style="color:darkgray">Pending Payment- Copy No. 0001</h3></center>
                        </div>
                        <br><br><br><br><br>
                    </head>
                    <body>
                        <h3 style="color:teal">Customer Name: <font color="black">Melody Reyes Legaspi</font></h3>
                        <h3 style="color:teal">Customer Type: <font color="black">Individual</font></h3>
                        <h3 style="color:teal">Date: <font color="black">July 4, 2016</font></h3>
                        <br>
                        <center><h2 style="background-color:darkgray; color:black; padding:15px">List of Pending Payment(s)</h2></center>
                        
                        <center><h3>Order No. : ORN 0001</h3></center>
                        
                        <center><p>Date of Transaction: 2016-07-24</p></center>          
                        <center><p>Total Amount to Pay: Php 15,000.00</p></center>
                        <center><p>Outstanding Balance: Php 5,000.00</p></center>
                        <center><p>Due Date: 2016-08-16</p></center>
                        
                    </body>
                </html> 
            ');

        return $pdf->stream();
    }
    
    // public function invoice()
    // {
    //     $customer = $this->getCustomer();
    //     $payment_list = $this->getPaymentList();
    //     $date = date('Y-m-d');
    //     $issue = "2222";
    //     $view = \View::make('invoice', compact('customer', 'payment_list', 'date', 'issue'));

    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML($view);

    //     return $pdf->stream('invoice.pdf');
    // }

    // public function getCustomer()
    // {

    //     $search_query = "Melody Reyes Legaspi";

    //     $customers = \DB::table('tblPayment AS a')
    //                 ->leftJoin('tblCustIndividual AS b', 'a.strCustomerIdFK', '=', 'b.strIndivID')
    //                 ->select('a.*', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'))
    //                 ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), $search_query)
    //                 ->get();

    //     // $payments = Payment::all();

      

    //     return $customers;
    // }

    // public function getPaymentList()
    // {

    //     $search_query = "Melody Reyes Legaspi";

    //     $payments = \DB::table('tblPayment AS a')
    //                 ->leftJoin('tblCustIndividual AS b', 'a.strCustomerIdFK', '=', 'b.strIndivID')
    //                 ->select('a.*', \DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName) AS fullname'))
    //                 ->where(\DB::raw('CONCAT(b.strIndivFName, " ", b.strIndivMName, " ", b.strIndivLName)'), $search_query)
    //                 ->get();

    //     return $payments;

    // }
}
