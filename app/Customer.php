<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tblCustomer';

    protected $primaryKey = 'strCustomer_IndFK', 'strCustomer_CompanyFK';

    protected $fillable = array('strCustomer_IndFK', 'strCustomer_CompanyFK',
    							'strCustomerAccountIDFK', 'boolIsActive',
    							'strCustInactiveReason');

    public function individual() {

    	return $this->belongsTo('App\Individual', 'strCustomer_IndFK');
    }

    public function company() {

    	return $this->belongsTo('App\Company', 'strCustomer_CompanyFK');
    }

}
