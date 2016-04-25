<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialButton extends Model
{
    protected $table = 'tblButton';
	protected $primaryKey = 'strButtonID';
	protected $fillable = array('strButtonID',
								'strButtonBrand',
								'strButtonSize',
								'strButtonColor',
								'strButtonDesc',
								'strButtonImage',
								'boolIsActive'
								//
								);
}
