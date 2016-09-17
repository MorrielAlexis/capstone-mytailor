<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderPayment extends Model
{
    protected $table = 'tblJOPayment';

    protected $primaryKey = 'strPaymentID';

    protected $fillable = array('strPaymentID',
    							'strTransactionFK',
    							'strNonShopTransacAlterFK', 
						    	'strTransacAlterFK',
						    	'dblAmountToPay',
						    	'dblOutstandingBal',
						    	'dblAmountTendered',
						    	'dblAmountChange',
						    	'strReceivedByEmployeeNameFK',
						    	'dtPaymentDate',
						    	'dtPaymentDueDate',
						    	'strPaymentStatus',
						    	'strAdditionalChargeFK',
						    	'boolIsActive');
}
