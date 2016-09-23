<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Requests;
use App\Http\Requests\MaintenanceCustomerCompanyRequest;
use App\Http\Controllers\Controller;

class CustomerCompanyController extends Controller
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
        return view('maintenance.maintenance-customer-company')
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
    public function store(MaintenanceCustomerCompanyRequest $request)
    {
        $comp = Company::get();

        $company = Company::create(array(
                    'strCompanyID' => $request->input('strCompanyID'),
                    'strCompanyName' => trim($request->input('strCompanyName')),     
                    'strCompanyBuildingNo' => trim($request->input('strCompanyBuildingNo')),   
                    'strCompanyStreet' => trim($request->input('strCompanyStreet')),
                    'strCompanyBarangay' => trim($request->input('strCompanyBarangay')), 
                    'strCompanyCity' => trim($request->input('strCompanyCity')), 
                    'strCompanyProvince' => trim($request->input('strCompanyProvince')),
                    'strCompanyZipCode' => trim($request->input('strCompanyZipCode')),
                    'strContactPerson' => trim($request->input('strContactPerson')),
                    'strCompanyEmailAddress' => trim($request->input('strCompanyEmailAddress')),         
                    'strCompanyCPNumber' => trim($request->input('strCompanyCPNumber')), 
                    'strCompanyCPNumberAlt' => trim($request->input('strCompanyCPNumberAlt')), 
                    'strCompanyTelNumber' => trim($request->input('strCompanyTelNumber')),
                    'strCompanyFaxNumber' => trim($request->input('strCompanyFaxNumber')),
                    'boolIsActive' => 1
                    ));

                $company->save();

        \Session::flash('flash_message','Customer successfully added.'); //flash message

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
        $checkCompany = Company::all();
        $isAdded=FALSE;
        $count = 0; 
        $count2 = 0;

        if(!($company->strCompanyEmailAddress == trim($request->input('editComEmailAddress')))) {    
            $count = \DB::table('tblCustCompany')
                ->select('tblCustCompany.strCompanyEmailAddress')
                ->where('tblCustCompany.strCompanyEmailAddress','=', trim($request->input('editComEmailAddress')))
                ->count();
        }

        if(!($company->strCompanyCPNumber == trim($request->input('editCel')))) { 
            $count2 = \DB::table('tblCustCompany')
                ->select('tblCustCompany.strCompanyCPNumber')
                ->where('tblCustCompany.strCompanyCPNumber','=', trim($request->input('editCel')))
                ->count();
        }
            if($count > 0 || $count2 > 0){
            $isAdded = TRUE;

        }



        foreach($checkCompany as $check)
        if(!strcasecmp($check->strCompanyID, $request->input('editComID')) == 0 &&
            strcasecmp($check->strCompanyName, trim($request->input('editComName'))) == 0 &&
            strcasecmp($check->strContactPerson, trim($request->input('editConPerson'))) == 0)
            $isAdded = TRUE;   
            

            if(!$isAdded){
        
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

            \Session::flash('flash_message_update','Company detail/s successfully updated.');
        }else \Session::flash('flash_message_duplicate','Company detail/s already exists.'); //flash message

        return redirect('maintenance/company');
    }

    function deleteCompany(Request $request)
    {
        $id = $request->input('delCompanyID');
        $company = Company::find($request->input('delCompanyID'));
          $count = \DB::table('tblJobOrder')
                ->join('tblCustCompany', 'tblJobOrder.strJO_CustomerCompanyFK', '=', 'tblCustCompany.strCompanyID')
                ->select('tblCustCompany.*')
                ->where('tblCustCompany.strCompanyID','=', $id)
                ->count();

             if ($count != 0){
                    return redirect('maintenance/company?success=beingUsed'); 
                }else {

                $company->strCompanyInactiveReason = trim($request->input('delInactiveComp'));
                $company->boolIsActive = 0;
                $company->save();



        \Session::flash('flash_message_delete','Customer successfully deactivated.');

        return redirect('maintenance/company');
        }
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
