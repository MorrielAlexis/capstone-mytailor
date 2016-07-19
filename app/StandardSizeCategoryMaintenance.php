<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardSizeCategoryMaintenance extends Model
{
    protected $table = 'tblStandardSizeCategory';
    
	protected $primaryKey = 'strStandardSizeCategoryID';
	protected $fillable = array('strStandardSizeCategoryID',
								'strStandardSizeCategoryName',
								'txtStandardSizeCategoryDesc',
								'strStandardSizeCategoryInactiveReason',
								'boolIsActive'
														
								);
}
