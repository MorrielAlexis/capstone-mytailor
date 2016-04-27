<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarmentCategory extends Model
{
    protected $table = 'tblGarmentCategory';

	protected $primaryKey = 'strGarmentCategoryID';
	protected $fillable = array(
								'strGarmentCategoryID',
								'strGarmentCategoryName',
								'textGarmentCategoryDesc',
								'strGarmentCategoryInactiveReason',
								'boolIsActive'
								//
								);


	public function segments()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\GarmentSegment');

	}		

}
