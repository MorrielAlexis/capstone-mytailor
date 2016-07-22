<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tblPayment';

    protected $primaryKey = 'strPaymentID';

    protected $fillable = array('strTransactionFK', 'strTransacAlterFk',
    					'dblAmountTendered', 'dblAmountToPay'
    					'dblOustandingBal', 'strReceivedByEmployeeNameFK', 
    					'dtPaymentDate', 'dtPaymentDueDate',
    					'strPaymentStatus', 'strAdditionalChargeFK'
    					'boolIsActive');   
}
