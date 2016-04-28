<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    protected $table = 'tblEmployeeRole';

    protected $primaryKey = 'strEmpRoleID';

    protected $fillable = ['strEmpRoleName', 
    						'strEmpRoleDesc',  	
    						'strRoleInactiveReason',			
    					'boolIsActive'];
    					

    // An role can be posess by many emloyees.
   public function employees()
	{
		return $this->hasMany('App\Employee','strRole','strEmpRoleID');
	}

}
