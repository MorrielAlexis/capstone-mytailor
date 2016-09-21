<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'tblEmployee';
	protected $primaryKey = 'strEmployeeID';
	protected $fillable = array('strEmployeeID',
								'strEmpFName',
								'strEmpMName',
								'strEmpLName',
								'dtEmpBday',
								'strSex',
								'strEmpHouseNo',
								'strEmpStreet',
								'strEmpBarangay',
								'strEmpCity',
								'strEmpProvince',
								'strEmpZipCode',
								'strRole',
								'strCellNo',
								'strCellNoAlt',
								'strPhoneNo',
								'strEmailAdd',
								'strEmpImg',
								'strEmpInactiveReason',
								'userId',
								'boolIsActive'
								//
								);
	public function roles()
	{
		return $this->belongsTo('App\EmployeeRole','strRole');
	}
}
