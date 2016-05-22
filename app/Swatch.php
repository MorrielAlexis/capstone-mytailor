<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swatch extends Model
{
    protected $table = 'tblSwatch';

	protected $primaryKey = 'strSwatchID';
	protected $fillable = array('strSwatchID',
								'strSwatchTypeFK',
								'strSwatchNameFK',
								'strSwatchCode',
								'strSwatchImage',
								'strSwatchInactiveReason',
								'boolIsActive'
								//
								);

}
