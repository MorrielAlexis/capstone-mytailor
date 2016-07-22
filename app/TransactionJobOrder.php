<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrder extends Model
{
    public $table = 'tblJobOrder';

    public $primaryKey = 'strJobOrderID';

    public $fillable = array('strJobOrderID', 
    						'strJO_CustomerFK', 
    						'strTermsOfPayment', 
    						'strModeOfPayment', 
    						'intJO_ItemQty',
    						'boolIsOrderAccepted',
    						'dtOrderDate',
    						'dtOrderApproved',
    						'dtOrderExpectedToBeDone',
    						'dtExpectedDeliveryDate',
    						'dtFinished',
    						'dtDelivered',
    						'boolIsActive');
}
