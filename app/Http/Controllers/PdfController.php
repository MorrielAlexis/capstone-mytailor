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

    
    public function invoice()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view = \View::make('invoice', compact('data', 'date', 'invoice'));

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice.pdf');
    }

    public function getData()
    {
        $data = [
            'quantity'      => '1',
            'description'   => 'some random text',
            'price'         => '500',
            'total'         => '500',
                ];

        return $data;
    }

}
