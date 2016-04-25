<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'tblThread';

	protected $primaryKey = 'intThreadID';

	protected $fillable = ['strThreadBrand', 'strThreadColor',
							'strThreadDesc', 'strThreadImage',
							'boolIsActive'];
}
