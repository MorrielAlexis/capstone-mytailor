<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'tblCustCompany';

    protected $primaryKey = 'strCompanyID';

    protected $fillable = ['strCompanyName', 'strCompanyBuildingNo',
    					'strCompanyStreet', 'strCompanyBarangay',
    					'strCompanyCity', 'strCompanyProvince',
    					'strCompanyZipCode', 'strContactPerson',
    					'strCompanyEmailAddress', 'strCompanyTelNumber',
    					'strCompanyCPNumber', 'strCompanyCPNumberAlt',
    					'strCompanyFaxNumber', 'boolIsActive'
    					'strCompanyInactiveReason'];   
}
