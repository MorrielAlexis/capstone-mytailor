<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementCategory extends Model
{
    protected $table = 'tblMeasurementCategory';

	protected $primaryKey = 'strMeasCatID';
	protected $fillable = array('strMeasCatID',
								'strMeasGarFK',
								'strMeasSegmentFK',
								'strMeasDetFK',
								'strMeasCatInactiveReason',
								'boolIsActive'
								//
								);

	public function measurementDetails()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\MeasurementDetail');

	}

}
