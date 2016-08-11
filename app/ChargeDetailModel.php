<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeDetailModel extends Model
{
    protected $table = 'tblChargeDetail';
	protected $primaryKey = 'strChargeDetailID';
	protected $fillable = array('strChargeDetailID',
								'strChargeCatFK',
								'strChargeDetSegFK',
								'strChargeDetInactiveReason',
								'dblChargeDetPrice',
								'boolIsActive'
								);
}
