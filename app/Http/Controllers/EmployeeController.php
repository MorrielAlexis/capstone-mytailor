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
        return view('maintenance-employee')
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
        $emp = Employee::get();

            $employee = Employee::create(array(
                'strEmployeeID' => $request->input('strEmployeeID'),
                'strEmpFName' => trim($request->input('strEmpFName')),  
                'strEmpMName' => trim($request->input('strEmpMName')), 
                'strEmpLName' => trim($request->input('strEmpLName')),
                'dtEmpBday' => date("Y-m-d", strtotime($request->input("dtEmpBday"))),
                'strSex' => $request->input('strSex'),
                'strEmpHouseNo' => trim($request->input('strEmpHouseNo')),   
                'strEmpStreet' => trim($request->input('strEmpStreet')),
                'strEmpBarangay' => trim($request->input('strEmpBarangay')), 
                'strEmpCity' => trim($request->input('strEmpCity')), 
                'strEmpProvince' => trim($request->input('strEmpProvince')),
                'strEmpZipCode' => trim($request->input('strEmpZipCode')),
                'strRole' => $request->input('strRole'), 
                'strCellNo' => trim($request->input('strCellNo')),
                'strCellNoAlt' => trim($request->input('strCellNoAlt')),
                'strPhoneNo' => trim($request->input('strPhoneNo')),
                'strEmailAdd' => trim($request->input('strEmailAdd')),
                'boolIsActive' => 1
            ));
            $employee->save();

         \Session::flash('flash_message','Employee detail successfully added.'); //flash message

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
        $employee = Employee::find($id);
        return response()->json($employee);
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

    function updateEmployee(Request $request)
    {        
            $employee = Employee::find($request->input('editEmpID'));

                $employee->strEmpFName = trim($request->input('editFirstName')); 
                $employee->strEmpLName = trim($request->input('editLastName'));  
                $employee->strEmpMName = trim($request->input('editMiddleName'));    
                $employee->dtEmpBday = date("Y-m-d", strtotime($request->input("editDtEmpBday")));
                $employee->strSex = $request->input('editSex');
                $employee->strEmpHouseNo = trim($request->input('editEmpHouseNo'));
                $employee->strEmpStreet = trim($request->input('editEmpStreet'));
                $employee->strEmpBarangay = trim($request->input('editEmpBarangay'));
                $employee->strEmpCity = trim($request->input('editEmpCity'));
                $employee->strEmpProvince = trim($request->input('editEmpProvince'));
                $employee->strEmpZipCode = trim($request->input('editEmpZipCode'));
                $employee->strRole = $request->input('editRoles');
                $employee->strCellNo = trim($request->input('editCellNo'));
                $employee->strCellNoAlt = trim($request->input('editCellNoAlt'));
                $employee->strPhoneNo = trim($request->input('editPhoneNo'));
                $employee->strEmailAdd = trim($request->input('editEmail'));

            $employee->save();

            \Session::flash('flash_message_update','Employee detail/s successfully updated.'); //flash message

            return redirect('maintenance/employee');

    }

    function deleteEmployee(Request $request)
    {
        $employee = Employee::find($request->input('delEmpID'));

        $employee->strEmpInactiveReason = trim($request->input('delInactiveEmp'));
        $employee->boolIsActive = 0;

        $employee->save();

        \Session::flash('flash_message_delete','Employee detail successfully deactivated.'); //flash message
        
        return redirect('maintenance/employee');
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
