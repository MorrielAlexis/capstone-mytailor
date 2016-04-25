<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarmentCategory extends Model
{
    protected $table = 'tblGarmentCategory';

    protected $primaryKey = 'strGarmentCategoryID';

    protected $fillable = ['strGarmentCategoryName', 'textGarmentCategoryDesc', 
    					'boolIsActive'];   
}
