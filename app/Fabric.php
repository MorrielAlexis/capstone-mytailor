<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $table = 'tblFabric';
    
	protected $primaryKey = 'strFabricID';
	protected $fillable = array('strFabricID',
								'strFabricTypeFK',
								'strFabricPatternFK',
								'strFabricColorFK',
								'strFabricThreadCountFK',
								'strFabricName',
								'dblFabricPrice',
								'strFabricCode',
								'strFabricImage',
								'txtFabricDesc',
								'strFabricInactiveReason',
								'boolIsActive'
								//
								);
}
