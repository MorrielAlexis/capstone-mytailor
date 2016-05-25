<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'tblThread';

	protected $primaryKey = 'intThreadID';

	protected $fillable = array('intThreadID','strThreadBrand', 'strThreadColor',
							'strThreadDesc', 'strThreadImage',
							'strThreadInactiveReason',
							'boolIsActive');
}
