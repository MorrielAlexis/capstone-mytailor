<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarmentSegment extends Model
{
    protected $table = 'tblSegment';

    protected $primaryKey = 'strSegmentID';

    protected $fillable = ['strSegCategoryFK', 
    						'strSegmentName',
    						'textSegmentDesc', 
    						'strSegInactiveReason',
    						'boolIsActive'];   

    public function garmentcategories()
	{

		// return $this->belongstoMany('App\GarmentCategory')->withPivot('tblGarment_Segment');
		return $this->belongstoMany('App\GarmentCategory');

	}					
}
