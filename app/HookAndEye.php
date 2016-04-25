<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HookAndEye extends Model
{
     protected $table = 'tblHookEye';

	protected $primaryKey = 'strHookID';

	protected $fillable = ['strHookBrand', 'strHookSize',
							'strHookColor', 'strHookImage',
							'textHookDesc', 'boolIsActive'];

}