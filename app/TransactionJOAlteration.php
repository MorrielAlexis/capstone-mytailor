<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJOAlteration extends Model
{
    public $table = 'tblJOAlteration';

    public $primaryKey = 'strJOAlterationID';

    public $fillable = array('strJOAlterationID', 
    						'strAlterationType',
    						'strAlterationFK',
    						'txtAlterationNotes',
    						'strSegmentMeasSpecFK',
    						'strSegmentNonShopSpecFK');
}
