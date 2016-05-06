<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementCategory extends Model
{
    protected $table = 'tblMeasurementCategory';

	protected $primaryKey = 'strMeasCatID','strMeasGarFK','strMeasSegmentNameFK','strMeasDetFK';
	protected $fillable = array('strMeasCatID',
								'strMeasGarFK',
								'strMeasSegmentNameFK',
								'strMeasDetFK',
								'strMeasCatInactiveReason',
								'boolIsActive'
								//
								);

	public function measurementdetails()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\MeasurementCategory');

	}

}
