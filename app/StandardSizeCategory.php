<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardSizeCategory extends Model
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
