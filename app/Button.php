<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
     protected $table = 'tblButton';

	protected $primaryKey = 'intButtonID';

	protected $fillable = ['strButtonBrand', 
							'strButtonSize',
							'strButtonColor',
							'strButtonDesc',
							'strButtonImage', 
							'strButtonInactiveReason',
							'boolIsActive'];
}
