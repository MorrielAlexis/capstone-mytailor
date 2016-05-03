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

        return redirect('employee');
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
        $isAdded = FALSE;
        $validInput = TRUE;

        $regex = "/^[a-zA-Z\'\-\.]+( [a-zA-Z\'\-\.]+)*$/";
        $regexHouse = "/[0-9a-zA-Z\-\s]+$/";
        $regexStreet = "/^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/";
        $regexBarangay = "/^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/";
        $regexCity = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";

        $regexZip = "/^[0-9]+$/";
        $regexProvince = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";

        if(!trim($request->input('addFirstName')) == '' && !trim($request->input('addLastName')) == '' && 
           !trim($request->input('addEmpHouseNo')) == '' && !trim($request->input('addEmail')) == '' &&
           !trim($request->input('addEmpStreet')) == '' && !trim($request->input('addEmpCity')) == '' && 
           !trim($request->input('addCellNo')) == ''){
                $validInput = TRUE;
                    if (preg_match($regex, $request->input('addFirstName')) && preg_match($regex, $request->input('addLastName')) &&
                        preg_match($regexStreet, $request->input('addEmpStreet')) && !!filter_var($request->input('addEmail'), FILTER_VALIDATE_EMAIL) &&
                        preg_match($regexHouse, $request->input('addEmpHouseNo')) && preg_match($regexCity, $request->input('addEmpCity'))){
                            $validInput = TRUE;
                                if((!trim($request->input('addEmpZipCode')) == '' || !trim($request->input('addEmpProvince')) == '' || !trim($request->input('addEmpBarangay')) == 0)){
                                    if (preg_match($regexZip, $request->input('addEmpZipCode')) || preg_match($regexProvince, $request->input('addEmpProvince')) ||
                                        preg_match($regexBarangay, $request->input('addEmpBarangay'))){
                                        $validInput = TRUE;
                                    }else $validInput = FALSE;
                                }
                    }else $validInput = FALSE;
        }else $validInput = FALSE;

        //dd($validInput);
        $count = \DB::table('tblEmployee')
            ->select('tblEmployee.strEmailAdd')
            ->where('tblEmployee.strEmailAdd','=', trim($request->input('addEmail')))
            ->count();

        $count2 = \DB::table('tblEmployee')
            ->select('tblEmployee.strCellNo')
            ->where('tblEmployee.strCellNo','=', trim($request->input('addCellNo')))
            ->count();
            
        if($count > 0 || $count2 > 0){
            $isAdded = TRUE;
        }else{
            foreach($emp as $emp){
            if(strcasecmp($emp->strEmpFName, trim($request->input('addFirstName'))) == 0 &&
                    strcasecmp($emp->strEmpMName, trim($request->input('addMiddleName'))) == 0 &&
                    strcasecmp($emp->strEmpLName, trim($request->input('addLastName'))) == 0){
                        //$isAdded = TRUE;
                dd(strcasecmp($emp->strEmpFName, trim($request->input('addFirstName'))),
                    strcasecmp($emp->strEmpMName, trim($request->input('addMiddleName'))),
                    strcasecmp($emp->strEmpLName, trim($request->input('addLastName'))));
                }
            }
        }


        if($validInput){
            if(!$isAdded){
                $employee = Employee::create(array(
                    'strEmployeeID' => $request->input('addEmpID'),
                    'strEmpFName' => trim($request->input('addFirstName')),  
                    'strEmpMName' => trim($request->input('addMiddleName')), 
                    'strEmpLName' => trim($request->input('addLastName')),
                    'dtEmpBday' => date("Y-m-d", strtotime($request->input("adddtEmpBday"))),
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
