<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrder extends Model
{
    public $table = 'tblJobOrder';

    public $primaryKey = 'strJobOrderID';

    public $fillable = array('strJobOrderID', 
    						'strJO_CustomerFK', 
                            'strJO_CustomerCompanyFK', 
    						'strTermsOfPayment', 
    						'strModeOfPayment', 
    						'intJO_OrderQuantity',
                            'dblOrderTotalPrice',
    						'boolIsOrderAccepted',
    						'dtOrderDate',
    						'dtOrderApproved',
    						'dtOrderExpectedToBeDone',
    						'dtExpectedDeliveryDate',
    						'dtFinished',
    						'dtDelivered',

    						'boolIsActive',
                            'boolIsOnline');


    public function joSpecifics()
    {
        return $this->hasMany('App\TransactionJobOrderSpecifics');
    }
}
