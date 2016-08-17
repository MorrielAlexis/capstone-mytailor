<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionJobOrderReceipt extends Model
{
    protected $table = 'tblJobOrderReceipt';

    protected $primaryKey = 'strOrderReceiptID';

    protected $fillable = array('strOrderReceiptID',
    						'strJobOrderFK',
    						'strIssuedByEmpNameFK',
    						'boolIsActive');
}
