<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionNonShopAlteration extends Model
{
    public $table = 'tblNonShopAlteration';

    public $primaryKey = 'strNonShopAlterID';

    public $fillable = array('strNonShopAlterID', 
    						'strCustIndFK',
    						'strCustCompFK', 
    						'dblOrderTotalPrice', 
    						'dtAlteration',
                            'boolIsOnline',
                            'boolIsAccepted');

    public function alterationSpecifics()
    {
    	return $this->hasMany('App\TransactionNonShopAlterationSpecifics');
    }


}
