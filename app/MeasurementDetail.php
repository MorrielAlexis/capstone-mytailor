<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementDetail extends Model
{
    protected $table = 'tblMeasurementDetail';

	protected $primaryKey = 'strMeasurementDetailID';
	protected $fillable = array('strMeasurementDetailID',
								'strMeasurementDetailName',
								'txtMeasurementDetailDesc',
								'strMeasDetInactiveReason',
								'boolIsActive'
								//
								);

	public function measurementcategories()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\MeasurementCategory','tblMetCategory_Detail', 'strMesCatIDfk', 'strMesDetIDfk');
		return $this->hasMany('App\MeasurementCategory');
	}

}
