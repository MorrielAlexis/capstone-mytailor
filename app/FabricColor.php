<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricColor extends Model
{
    protected $table = 'tblFabricColor';
    
	protected $primaryKey = 'strFabricColorID';
	protected $fillable = array('strFabricColorID',
								'strFabricColorName',
								'txtFabricColorDesc',
								'strFabricColorInactiveReason',
								'boolIsActive'
								//
								);
}
