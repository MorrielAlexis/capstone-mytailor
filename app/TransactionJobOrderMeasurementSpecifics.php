<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderMeasurementSpecifics extends Model
{
    protected $table = 'tblJOMeasureSpecific';

    protected $primaryKey = 'strJOMeasureSpecificID';

    protected $fillable = array('strJOMeasureSpecificID',
    							'strJobOrderSpecificFK', 
						    	'strMeasureProfileFK',
						    	'strMeasureDetailFK',
						    	'strStandardSizeFK',
						    	'dblMeasureValue',
						    	'strBodyPartFormFK',
						    	'strUnitOfMeasurement',
						    	'boolIsActive');
}
