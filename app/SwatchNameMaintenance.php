<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SwatchNameMaintenance extends Model
{
     protected $table = 'tblSwatchName';

	protected $primaryKey = 'strSwatchNameID';
	protected $fillable = array('strSwatchNameID',
								'strSName',
								'txtSwatchNameDesc',
								'strSwatchNameInactiveReason',
								'boolIsActive'
								//
								);

}
