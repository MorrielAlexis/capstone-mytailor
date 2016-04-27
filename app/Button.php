<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
     protected $table = 'tblButton';

	protected $primaryKey = 'strButtonID';

	protected $fillable = ['strButtonBrand', 
							'strButtonSize',
							'strButtonColor',
							'strButtonDesc',
							'strButtonImage', 
							'strButtonInactiveReason',
							'boolIsActive'];
}
