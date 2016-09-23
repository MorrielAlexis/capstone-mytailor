<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderSpecifics extends Model
{
    public $table = 'tblJOSpecific';

    public $primaryKey = 'strJOSpecificID';

    public $fillable = array('strJOSpecificID', 
    						'strJobOrderFK', 
                            'strJOSegmentFK', 
    						'strJOFabricFK', 
    						'intQuantity', 
    						'dblUnitPrice',
                            'intEstimatedDaysToFinish',
    						'strEmployeeNameFK',
    						'dtDateModified',
    						'boolIsActive');

     public function onlineJobOrder()
    {
        return $this->belongsTo('App\TransactionJobOrder', 'strJobOrderFK');
    }
}
