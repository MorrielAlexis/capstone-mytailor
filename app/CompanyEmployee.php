<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyEmployee extends Model
{
    protected $table = 'tblCustCompEmployee';
	protected $primaryKey = 'strCustCompEmployeeID';
	protected $fillable = array('strCustCompEmployeeID',
								'strCustCompanyFK',
								'strCustCompEmpFirstName',
								'strCustCompEmpLastName',
								'strCustCompEmpMiddleName',
								'strCustCompEmpSex',
								'boolIsActive'
								//
								);
	public function company()
	{
		return $this->belongsTo('App\Company','strCustCompanyFK');
	}
}
