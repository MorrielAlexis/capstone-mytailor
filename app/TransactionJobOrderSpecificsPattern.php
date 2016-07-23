<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderSpecificsPattern extends Model
{
    protected $table = 'tblJOSpecificSegmentPattern';

    protected $primaryKey = 'intJOSpecSegmentPatternID';

    protected $fillable = array('intJOSpecSegmentPatternID',
    							'strJobOrderSpecificFK', 
						    	'strSegmentPatternFK');
}
