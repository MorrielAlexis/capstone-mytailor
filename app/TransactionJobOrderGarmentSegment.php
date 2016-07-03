<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderGarmentSegment extends Model
{
    protected $table = 'tblJO_Garment';

    protected $primaryKey = 'strJobOrderID', 'strJOCategoryID', 'strJOSegmentID';

    protected $fillable = array('strJobOrderID', 
						    	'strJOCategoryID', 
						    	'strJOSegmentID',
						    	'boolisActive',
						    	'boolIsFinish');
}
