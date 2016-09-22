<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilitiesVat extends Model
{
    protected $table = 'tblVat';
    
	protected $primaryKey = 'intVatID';
	protected $fillable = array('intVatID',
								'strTaxName',
								'dblTaxPercentage'
								
								//
								);

}
