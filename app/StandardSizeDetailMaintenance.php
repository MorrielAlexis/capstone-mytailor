<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardSizeDetailMaintenance extends Model
{
    protected $table = 'tblStandardSizeDetail';
    
	protected $primaryKey = 'strStandardSizeDetID';
	protected $fillable = array('strStandardSizeDetID',
								'strStanSizeSegmentFK',
								'strStanSizeMeasCatFK',
								'strStanSizeCategoryFK',
								'strStanSizeDetailName',
								'strStanSizeFitType',
								'dblStanSizeInch',
								'dblStanSizeCm',
								'txtStanSizeDesc',
								'boolIsActive'
														
								);
	
}
