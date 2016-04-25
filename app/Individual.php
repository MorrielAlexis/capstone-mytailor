<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    
    protected $table = 'tblCustIndividual';

    protected $primaryKey = 'strIndivID';

    protected $fillable = ['strIndivFName', 'strIndivLName',
    					'strIndivMName', 'strIndivGender',
    					'strIndivHouseNo', 'strIndivStreet',
    					'strIndivBarangay', 'strIndivCity',
    					'strIndivProvince', 'strIndivZipCode',
    					'strIndivLandlineNumber', 'strIndivCPNumber',
    					'strIndivCPNumberAlt', 'strIndivEmailAddress',
    					'boolIsActive'];   
}
