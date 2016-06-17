<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RoleRequest;

use App\EmployeeRole;
use App\Http\Controllers\Controller;

class EmployeeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the employee roles
         $ids = \DB::table('tblEmployeeRole')
            ->select('strEmpRoleID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strEmpRoleID', 'desc')
            ->take(1)
            ->get();
        //$reason = EmployeeRole::all(); /*dummy lang wala pang model un reasons e*/

        $ID = $ids["0"]->strEmpRoleID;
        $newID = $this->smartCounter($ID);  
        $role = EmployeeRole::all();

         //load the view and pass the employees
        return view('maintenance-employee-role')
                ->with('role', $role)
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
    public function store(RoleRequest $request)
    {        
            $role = EmployeeRole::create(array(
                'strEmpRoleID' => $request->input('addRoleID'),
                'strEmpRoleName' =>trim($request->input('addRoleName')),
                'strEmpRoleDesc' => trim($request->input('addRoleDescription')),  
                'boolIsActive' => 1
            ));
        $added = $role->save();



         \Session::flash('flash_message','Employee role successfully added.'); //flash message

        return redirect('maintenance/employee-role');
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

    function updateRole(RoleRequest $request)
    {

        $role = EmployeeRole::find($request->input('editRoleID'));

               $role->strEmpRoleName = trim($request->input('editRoleName'));
               $role->strEmpRoleDesc = trim($request->input('editRoleDescription'));
        $role->save();

         \Session::flash('flash_message_update','Employee role detail/s successfully updated.'); //flash message

         return redirect('maintenance/employee-role');
        
       
    }

    
    function deleteRole(Request $request)
    {
        $id = $request->input('delRoleID');
        $role = EmployeeRole::find($request->input('delRoleID'));

        $count = \DB::table('tblEmployee')
                ->join('tblEmployeeRole', 'tblEmployee.strRole', '=', 'tblEmployeeRole.strEmpRoleID')
                ->select('tblEmployeeRole.*')
                ->where('tblEmployeeRole.strEmpRoleID','=', $id)
                ->count();

            if ($count != 0){
                    return redirect('maintenance/employee-role?success=beingUsed'); 
                } else {

                      $role->strRoleInactiveReason = trim($request->input('delInactiveRole'));
                            $role->boolIsActive = 0;

                            $role->save();

                             \Session::flash('flash_message_delete','Employee role successfully deactivated.'); //flash message
                            
                            return redirect('maintenance/employee-role');

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
