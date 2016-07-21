<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    
    protected $table = 'tblCustIndividual';

    protected $primaryKey = 'strIndivID';

    protected $fillable = array('strIndivID','strIndivFName', 
                        'strIndivLName',
    					'strIndivMName', 'strIndivSex',
    					'strIndivHouseNo', 'strIndivStreet',
    					'strIndivBarangay', 'strIndivCity',
    					'strIndivProvince', 'strIndivZipCode',
    					'strIndivLandlineNumber', 'strIndivCPNumber',
    					'strIndivCPNumberAlt', 'strIndivEmailAddress',
                        'strIndivInactiveReason', 'userId',
    					'boolIsActive');   
}
