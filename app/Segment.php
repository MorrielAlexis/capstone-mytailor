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
								'textSegmentDesc',
								'boolIsActive'
								//
								);
}
