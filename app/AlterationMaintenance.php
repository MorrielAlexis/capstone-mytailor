<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlterationMaintenance extends Model
{
     protected $table = 'tblAlterationMaintenance';
    
	protected $primaryKey = 'strAlterationID';
	protected $fillable = array('strAlterationID',
								'strAlterationName',
								'txtAlterationDesc',
								'strAlterationPrice',
								'boolIsActive'
								//
								);
}
