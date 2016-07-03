<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tblPayment';

    protected $primaryKey = 'strPaymentID';

    protected $fillable = array('strCustomerIdFK',
    					'dtTransacDate',
    					'dblAmtPayable',
    					'dblOustandingBal',
    					'dtDueDate',
    					'boolIsActive');   
}
