<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyPartForm extends Model
{
    protected $table = 'tblBodyPartForm';
    
	protected $primaryKey = 'strBodyFormID';
	protected $fillable = array('strBodyFormID',
								'strBodyPartFK',
								'strBodyFormName',
								'strBodyFormImage',
								'txtBodyFormDesc',
								'strBodyFormInactiveReason',
								'boolIsActive'
							
								);
}
