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
    					

   public function employees()
	{
		return $this->belongstoMany('App\Employee');
	}

}
