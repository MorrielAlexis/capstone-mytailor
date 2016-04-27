<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SegmentPattern extends Model
{
    protected $table = 'tblSegmentPattern';
	protected $primaryKey = 'strSegPatternID';
	protected $fillable = array('strSegPatternID',
								'strSegPCategoryFK',
								'strSegPNameFK',
								'strSegPName',
								'strSegPImage',
								'strSegPInactiveReason',
								'boolIsActive'
								//
								);

}
