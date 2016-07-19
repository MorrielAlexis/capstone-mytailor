<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyPartFormMaintenance extends Model
{
    protected $table = 'tblBodyPartForms';
    
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
