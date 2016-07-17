<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricThreadCountMaintenance extends Model
{
    protected $table = 'tblThreadCount';
    
	protected $primaryKey = 'strThreadCountID';
	protected $fillable = array('strThreadCountID',
								'strThreadCountName',
								'txtThreadCountDesc',
								'strThreadCountInactiveReason',
								'boolIsActive'
								//
								);
}
