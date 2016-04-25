<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SegmentPattern extends Model
{
     protected $table = 'tblSegmentPattern';

    protected $primaryKey = 'strSegPatternID';

    protected $fillable = ['strSegPCategoryFK', 'strSegPNameFK',
    					'strSegPName', 'strSegPImage',
    					'boolIsActive'];   
}
