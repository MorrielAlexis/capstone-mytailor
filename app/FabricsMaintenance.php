<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricsMaintenance extends Model
{
    protected $table = 'tblFabrics';
    
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
								'strFabricDesc',
								'strFabricInactiveReason',
								'boolIsActive'
								//
								);
}
