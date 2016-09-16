<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilitiesGeneral extends Model
{
    protected $table = 'tblUtilitiesGeneral';
    
	protected $primaryKey = 'intUtilsGenID';
	protected $fillable = array('intUtilsGenID',
								'strShopName',
								'strShopImage',
								'boolIsActive'
								//
								);}
