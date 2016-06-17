<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'tblSegment';
	protected $primaryKey = 'strSegmentID';
	protected $fillable = array('strSegmentID',
								'strSegCategoryFK',
								'strSegmentName',
								'strSegGender',
								'textSegmentDesc',
								'strSegInactiveReason',
								'boolIsActive'
								//
								);

	public function garmentcategories()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\GarmentCategory');

	}
}
