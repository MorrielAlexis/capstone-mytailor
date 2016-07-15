<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricPatternMaintenance extends Model
{
    protected $table = 'tblFabricPattern';
    
	protected $primaryKey = 'strFabricPatternID';
	protected $fillable = array('strFabricPatternID',
								'strFabricPatternName',
								'txtFabricPatternDesc',
								'strFabricPatternInactiveReason',
								'boolIsActive'
								//
								);
}
