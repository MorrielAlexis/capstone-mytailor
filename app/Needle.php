<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Needle extends Model
{
       
    protected $table = 'tblNeedle';

	protected $primaryKey = 'intNeedleID';

	protected $fillable = ['strNeedleBrand', 'strNeedleSize',
							'strNeedleDesc', 'strNeedleImage',
							'strNeedleInactiveReason',
							'boolIsActive'];
}
