<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionNonShopAlterationSpecifics extends Model
{
    public $table = 'tblNonShopAlterSpecific';

    public $primaryKey = 'strNonAlterSpecificID';

    public $fillable = array('strNonAlterSpecificID', 
    						'strNonShopAlterFK',
    						'strGarmentSegmentFK',
    						'strAlterationTypeFK',
    						'txtAlterationDesc');
}
