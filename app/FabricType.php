<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricType extends Model
{
    protected $table = 'tblFabricType';
    
	protected $primaryKey = 'strFabricTypeID';
	protected $fillable = array('strFabricTypeID',
								'strFabricTypeName',
								'txtFabricTypeDesc',
								'boolIsActive'
								//
								);

}
