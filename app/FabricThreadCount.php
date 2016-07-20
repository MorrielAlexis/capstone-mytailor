<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricThreadCount extends Model
{
    protected $table = 'tblFabricThreadCount';
    
	protected $primaryKey = 'strFabricThreadCountID';
	protected $fillable = array('strFabricThreadCountID',
								'strFabricThreadCountName',
								'txtFabricThreadCountDesc',
								'strFabricThreadCountInactiveReason',
								'boolIsActive'
								//
								);
}
