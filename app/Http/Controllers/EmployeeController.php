<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\EmployeeRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the employees
        $ids = \DB::table('tblEmployee')
            ->select('strEmployeeID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strEmployeeID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strEmployeeID;
        $newID = $this->smartCounter($ID);  

        $roles =  \DB::table('tblEmployeeRole')
                ->select('strEmpRoleID', 'strEmpRoleName', 'boolIsActive')
                ->get();

        $employee = \DB::table('tblEmployee')
            ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
            ->select('tblEmployee.*', 'tblEmployeeRole.strEmpRoleName')
            ->get();

        //load the view and pass the employees
        return view('employee')
                    ->with('employee', $employee)
                    ->with('roles', $roles)
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
        $this->saveEmployee($request);

        return redirect('maintenance/employee');
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
        $employee = Employee::find($id);

        $employee->boolIsActive = 0;

        $employee->save();
    }

    function saveEmployee(Request $request){
        $emp = Employee::get();

            $employee = Employee::create(array(
                'strEmployeeID' => $request->input('addEmpID'),
                'strEmpFName' => trim($request->input('addFirstName')),  
                'strEmpMName' => trim($request->input('addMiddleName')), 
                'strEmpLName' => trim($request->input('addLastName')),
                'dtEmpBday' => date("Y-m-d", strtotime($request->input("addDtEmpBday"))),
                'strSex' => $request->input('addSex'),
                'strEmpHouseNo' => trim($request->input('addEmpHouseNo')),   
                'strEmpStreet' => trim($request->input('addEmpStreet')),
                'strEmpBarangay' => trim($request->input('addEmpBarangay')), 
                'strEmpCity' => trim($request->input('addEmpCity')), 
                'strEmpProvince' => trim($request->input('addEmpProvince')),
                'strEmpZipCode' => trim($request->input('addEmpZipCode')),
                'strRole' => $request->input('addRoles'), 
                'strCellNo' => trim($request->input('addCellNo')),
                'strCellNoAlt' => trim($request->input('addCellNoAlt')),
                'strPhoneNo' => trim($request->input('addPhoneNo')),
                'strEmailAdd' => trim($request->input('addEmail')),
                'boolIsActive' => 1
            ));
            $employee->save();

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
