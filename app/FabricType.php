<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricType extends Model
{
    protected $table = 'tblFabricType';

    protected $primaryKey = 'strFabricTypeID';

    protected $fillable = ['strFabricTypeName', 'txtFabricTypeDesc',  				
    					'boolIsActive'];

   
}
