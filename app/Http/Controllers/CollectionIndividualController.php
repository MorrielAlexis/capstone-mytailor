<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Individual;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectionIndividualController extends Controller
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
        return redirect('transaction/collection/individual/payment-records');
    }

    public function paymentRecord(){

        $customers  = \DB::table('tblJobOrder AS a')
                ->leftJoin('tblJOPayment AS b', 'a.strJobOrderID', '=', 'b.strTransactionFK')
                ->leftJoin('tblCustIndividual AS c', 'c.strIndivID', '=', 'a.strJO_CustomerFK')
                ->select('a.*', 'b.*', 'c.strIndivID', \DB::raw('CONCAT(c.strIndivFName, " ", c.strIndivMName, " ", c.strIndivLName) AS fullname'))
                ->orderBy('b.strPaymentID')
                ->get();

        $cust = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                ->select('a.strIndivID', \DB::raw('CONCAT(a.strIndivFName, " ", a.strIndivMName, " ", a.strIndivLName) AS fullname'), 'b.*')
                ->orderBy('b.strJobOrderID')
                ->get();

        $orders = \DB::table('tblCustIndividual AS a')
                ->leftJoin('tblJobOrder AS b', 'a.strIndivID', '=', 'b.strJO_CustomerFK')
                 ->leftJoin('tblJOSpecific AS c', 'b.strJobOrderID', '=', 'c.strJobOrderFK')
                ->leftJoin('tblSegment AS d', 'c.strJOSegmentFK', '=', 'd.strSegmentID')
                ->leftJoin('tblGarmentCategory as e', 'd.strSegCategoryFK', '=', 'e.strGarmentCategoryID')
                ->leftJoin('tblFabric AS f', 'c.strJOFabricFK', '=', 'f.strFabricID')
                ->leftJoin('tblJOSpecificSegmentPattern AS g', 'c.strJOSpecificID', '=', 'g.strJobOrderSpecificFK')
                ->leftJoin('tblSegmentPattern AS h', 'g.strSegmentPatternFK', '=', 'h.strSegPatternID')
                ->leftJoin('tblSegmentStyleCategory AS i', 'h.strSegPStyleCategoryFK', '=', 'i.strSegStyleCatID')
                ->leftJoin('tblJOPayment AS j', 'b.strJobOrderID', '=', 'j.strTransactionFK')
                ->select('a.strIndivID', 'b.*', 'c.*', 'd.*', 'e.*', 'f.*', 'g.*', 'h.*', 'i.*', 'j.*')
                ->orderBy('b.strJobOrderID')
                ->get();

        $empEmail = \Auth::user()->email; //dd($empEmail);
        $emp = \DB::table('tblEmployee')
                ->select('tblEmployee.strEmployeeID')
                ->where('tblEmployee.strEmailAdd', 'LIKE', $empEmail)
                ->get(); //dd($emp);
        $empId;
        for($i = 0; $i < count($emp); $i++){
            $empId = $emp[$i]->strEmployeeID;
        } //dd($empId);

        $empname = \DB::table('tblEmployee')
                    ->select('strEmployeeID', \DB::raw('CONCAT(strEmpFName, " ", strEmpMName, " ", strEmpLName) AS employeename'))
                    ->where('strEmployeeID', '=', $empId)//Temporary, since naka-hardcode pa yung pagset ng employee sa naunang process.
                    ->first(); 

        session(['employee' => $empname]);

        return view('transaction-billingcollection-individual')
            ->with('customers', $customers)
            ->with('cust', $cust)
            ->with('orders', $orders)
            ->with('empname', $empname);

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
