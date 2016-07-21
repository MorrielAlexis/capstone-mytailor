<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAlteration extends Model
{
    public $table = 'tblNewAlteration';

    public $primaryKey = 'strNewAlterationID';

    public $fillable = array('strNewAlterationID', 
    						'strCustomerIndFK',
    						'strAlteSegmentFK', 
    						'strAlterationTypeFK', 
    						'dblAlterationPrice', 
    						'intAlteQty',
    						'dtAlteDate',
    						'txtAlteNotes',
    						'boolIsActive');
}
