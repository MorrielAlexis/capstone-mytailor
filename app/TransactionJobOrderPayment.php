<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderPayment extends Model
{
    protected $table = 'tblJOPayment';

    protected $primaryKey = 'strPaymentID';

    protected $fillable = array('strPaymentID',
    							'strTransactionFK', 
						    	'strTransacAlterFK',
						    	'dblAmountTendered',
						    	'dblAmountToPay',
						    	'dblOutstandingBal',
						    	'strReceivedByEmployeeNameFK',
						    	'dtPaymentDate',
						    	'dtPaymentDueDate',
						    	'strPaymentStatus',
						    	'strAdditionalChargeFK',
						    	'boolIsActive');
}
