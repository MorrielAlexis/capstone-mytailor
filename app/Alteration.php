<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alteration extends Model
{
     protected $table = 'tblAlteration';
    
	protected $primaryKey = 'strAlterationID';
	protected $fillable = array('strAlterationID',
								'strAlterationName',
								'strAlterationSegmentFK',
								'txtAlterationDesc',
								'dblAlterationPrice',
								'boolIsActive'
								//
								);
}
