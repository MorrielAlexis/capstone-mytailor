<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HookAndEye extends Model
{
     protected $table = 'tblHookEye';

	protected $primaryKey = 'intHookID';

	protected $fillable =array('intHookID','strHookBrand', 
							'strHookSize',
							'strHookColor', 'strHookImage',
							'textHookDesc', 
							'strHookInactiveReason',
							'boolIsActive');

}
