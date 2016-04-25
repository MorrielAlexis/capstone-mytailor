<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementCategory extends Model
{
    protected $table = 'tblMeasurementCategory';

    protected $primaryKey = 'strMeasCatID';

    protected $fillable = ['strMeasGarFK', 'strMeasSegmentNameFK',
    					'strMeasDetFK', 'boolIsActive'];


  /*  public function category() {

		return $this->belongsTo('GarmentCategory', 'strGarmentCategoryID');
	}

	public function segment() {

		return $this->belongsTo('GarmentSegment', 'strSegmentID');
	}

	public function pattern() {

		return $this->belongsTo('SegmentPattern', 'strMeasurementDetailID');
	}*/
}
