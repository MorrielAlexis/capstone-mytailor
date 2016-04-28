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

       /* $roles =  EmployeeRole::with('employees')
            ->select('strEmpRoleID', 'strEmpRoleName', 'boolIsActive')
            ->get();  
        */
        $roles = EmployeeRole::all();

        $reason = Employee::all(); /*dummy lang wala pang model un reasons e*/



        $newID = 0;

        $employee = Employee::all();

        // $employee = EmployeeRole::with('employees')
        //     ->join('tblEmployee', function($join){
        //     $join->on('tblEmployee.strEmployeeID', '=', 'tblEmployeeRole.strEmpRoleID');
        //     })->get();

        //load the view and pass the employees
        return view('employee')
                    ->with('employee', $employee)
                    ->with('roles', $roles)
                    ->with('reason', $reason)
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
