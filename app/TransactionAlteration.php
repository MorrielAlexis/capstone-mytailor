<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAlteration extends Model
{
    public $table = 'tblAlterationTransaction';

    public $primaryKey = 'strAltTransacID';

    public $fillable = array('strAltTransacID', 'strAltTransacSegFK', 'strAltTransacAltTypeFK', 'strAltTransacCustomeridFK', 'dblAltTransacPrice', 'intAltTransacMinDays');
}
