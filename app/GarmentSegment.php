<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarmentSegment extends Model
{
    protected $table = 'tblSegment';

    protected $primaryKey = 'strSegmentID';

    protected $fillable = ['strSegCategoryFK', 'strSegmentName',
    					'textSegmentDesc', 'boolIsActive'];   
}
