<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilitiesVatModel extends Model
{
    protected $table = 'tblVat';
    
	protected $primaryKey = 'intVatID';
	protected $fillable = array('intVatID',
								'strTaxName',
								'dblTaxPercentage'
								
								//
								);

}
