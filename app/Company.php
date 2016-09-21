<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'tblCustCompany';

    protected $primaryKey = 'strCompanyID';

    protected $fillable = array('strCompanyID','strCompanyName', 'strCompanyBuildingNo',
    					'strCompanyStreet', 'strCompanyBarangay',
    					'strCompanyCity', 'strCompanyProvince',
    					'strCompanyZipCode', 'strContactPerson',
    					'strCompanyEmailAddress', 'strCompanyTelNumber',
    					'strCompanyCPNumber', 'strCompanyCPNumberAlt',
    					'strCompanyFaxNumber', 'strCompanyImg','boolIsActive', 'userId',
    					'strCompanyInactiveReason');   

    public function customer_comp(){

        return $this->hasOne('App\Customer', 'strCustomer_CompanyFK', 'strCompanyID');
    }

    public function employees()
    {
        return $this->hasMany('App\CompanyEmployee','strCustCompanyFK','strCompanyID');
    }

}
