<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialNeedle extends Model
{
    protected $table = 'tblNeedle';
	protected $primaryKey = 'intNeedleID';
	protected $fillable = array('intNeedleID',
								'strNeedleBrand',
								'strNeedleSize',
								'strNeedleDesc',
								'strNeedleImage',
								'boolIsActive'
								//
								);
}