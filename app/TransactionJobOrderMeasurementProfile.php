<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderMeasurementProfile extends Model
{
    protected $table = 'tblJO_MeasureProfile';

    protected $primaryKey = 'strJOMeasureProfileID';

    protected $fillable = array('strJOMeasureProfileID',
    							'strMeasProfCustIndivFK', 
						    	'strMeasProfCustCompanyFK',
						    	'strProfileName',
						    	'strSex',
						    	'boolIsActive');
}
