<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustCompany extends Model
{
    protected $table = 'tblCustCompany';
	protected $primaryKey = 'strCompanyID';
	protected $fillable = array('strCompanyID',
								'strCompanyName',
								'strCompanyBuildingNo',
								'strCompanyStreet',
								'strCompanyBarangay',
								'strCompanyCity',
								'strCompanyProvince',
								'strCompanyZipCode',
								'strContactPerson',
								'strCompanyEmailAddress',
								'strCompanyTelNumber',
								'strCompanyCPNumber',
								'strCompanyCPNumberAlt',
								'strCompanyFaxNumber',
								'boolIsActive'
								//
								);
}