<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    protected $table = 'tblEmployeeRole';

    protected $primaryKey = 'strEmpRoleID';

    protected $fillable = ['strEmpRoleName', 'strEmpRoleDesc',  				
    					'boolIsActive'];
    					

   	public function employees() {

		return $this->hasMany('Employee', 'strEmployeeID');
	}

}
