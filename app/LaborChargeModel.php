<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaborChargeModel extends Model
{
    protected $table = 'tblLaborCharges';
	protected $primaryKey = 'strLaborChargeID';
	protected $fillable = array('strLaborChargeID',
								'strLCSegmentFK',
								'dblLCPrice',
								'boolIsActive'
								);
}
