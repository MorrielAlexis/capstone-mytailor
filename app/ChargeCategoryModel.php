<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeCategoryModel extends Model
{
    protected $table = 'tblChargeCategory';
	protected $primaryKey = 'strChargeCatID';
	protected $fillable = array('strChargeCatID',
								'strChargeCatName',
								'txtChargeDesc',
								'strChargeCatInactiveReason',
								'boolIsActive'
								);
}
