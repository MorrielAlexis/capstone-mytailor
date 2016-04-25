<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialHookEye extends Model
{
    protected $table = 'tblHookEye';
	protected $primaryKey = 'strHookID';
	protected $fillable = array('strHookID',
								'strHookBrand',
								'strHookSize',
								'strHookColor',
								'strHookImage',
								'textHookDesc',
								'boolIsActive'
								//
								);
}