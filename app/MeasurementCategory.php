<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementCategory extends Model
{
    protected $table = 'tblMeasurementCategory';
	protected $primaryKey = 'strMeasurementCategoryID';
	protected $fillable = array('strMeasurementCategoryID',
								'strMeasurementCategoryName',
								'txtMeasurementCategoryDesc',
								'strMeasCatInactiveReason',
								'boolIsActive'
								
								);
}
