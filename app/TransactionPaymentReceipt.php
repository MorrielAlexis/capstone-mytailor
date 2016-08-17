<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionPaymentReceipt extends Model
{
    protected $table = 'tblPaymentReceipt';

    protected $primaryKey = 'strPaymentReceiptID';

    protected $fillable = array('strPaymentReceiptID',
    						'strPaymentFK',
    						'strIssuedByEmpNameFK',
    						'boolIsActive');
}
