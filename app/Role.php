<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tblRole';
	protected $primaryKey = 'strRoleID';
	protected $fillable = array('strRoleID',
								'strRoleName',
								'strRoleDesc',
								'strRoleInactiveReason',	
							  	'boolIsActive');





    public function employees()
	{
		return $this->belongstoMany('App\Employee')->withPivot('tblEmployee_Role');
	}
}
