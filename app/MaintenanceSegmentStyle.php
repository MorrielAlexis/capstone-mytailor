<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSegmentStyle extends Model
{
    protected $table = 'tblSegmentStyleCategory';
	protected $primaryKey = 'strSegStyleCatID';
	protected $fillable = array('strSegStyleCatID',
								'strSegmentFK',
								'strSegStyleName',
								'strSegStyleCatDesc',
								'strSegStyleCatInactiveReason',
								'boolIsActive'
								);

}
