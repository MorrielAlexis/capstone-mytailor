<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the companies
        $ids = \DB::table('tblCustCompany')
            ->select('strCompanyID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strCompanyID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strCompanyID;
        $newID = $this->smartCounter($ID);      
        
        $company = Company::all();
        
        //load the view and pass the companies
        return view('customerCompany')
                    ->with('company', $company)
                    ->with('newID', $newID);
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
        $comp = Company::get();

        $company = Company::create(array(
                    'strCompanyID' => $request->input('addComID'),
                    'strCompanyName' => trim($request->input('addComName')),     
                    'strCompanyBuildingNo' => trim($request->input('addCustCompanyHouseNo')),   
                    'strCompanyStreet' => trim($request->input('addCustCompanyStreet')),
                    'strCompanyBarangay' => trim($request->input('addCustCompanyBarangay')), 
                    'strCompanyCity' => trim($request->input('addCustCompanyCity')), 
                    'strCompanyProvince' => trim($request->input('addCustCompanyProvince')),
                    'strCompanyZipCode' => trim($request->input('addCustCompanyZipCode')),
                    'strContactPerson' => trim($request->input('addConPerson')),
                    'strCompanyEmailAddress' => trim($request->input('addComEmailAddress')),         
                    'strCompanyCPNumber' => trim($request->input('addCel')), 
                    'strCompanyCPNumberAlt' => trim($request->input('addCelAlt')), 
                    'strCompanyTelNumber' => trim($request->input('addPhone')),
                    'strCompanyFaxNumber' => trim($request->input('addFax')),
                    'boolIsActive' => 1
                    ));

                $company->save();

        return redirect('maintenance/company');
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

    function updateCompany(Request $request)
    {
        $company = Company::find($request->input('editComID'));

                $company->strCompanyName = trim($request->input('editComName')); 
                $company->strCompanyBuildingNo = trim($request->input('editCustCompanyHouseNo'));
                $company->strCompanyStreet = trim($request->input('editCustCompanyStreet'));
                $company->strCompanyBarangay = trim($request->input('editCustCompanyBarangay'));
                $company->strCompanyCity = trim($request->input('editCustCompanyCity'));
                $company->strCompanyProvince = trim($request->input('editCustCompanyProvince'));
                $company->strCompanyZipCode = trim($request->input('editCustCompanyZipCode'));
                $company->strContactPerson = trim($request->input('editConPerson'));
                $company->strCompanyEmailAddress = trim($request->input('editComEmailAddress'));
                $company->strCompanyTelNumber = trim($request->input('editPhone'));          
                $company->strCompanyCPNumber = trim($request->input('editCel'));
                $company->strCompanyCPNumberAlt = trim($request->input('editCelAlt'));
                $company->strCompanyFaxNumber = trim($request->input('editFax'));

                $company->save();

        return redirect('maintenance/company');
    }

    function deleteCompany(Request $request)
    {
        $company = Company::find($request->input('editComID'));

        $company->boolIsActive = 0;
        $company->save();

        return redirect('maintenance/company');
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
