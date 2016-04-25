<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementDetail extends Model
{
    protected $table = 'tblMeasurementDetail';

    protected $primaryKey = 'strMeasurementDetailID';

    protected $fillable = ['strMeasurementDetailName', 'txtMeasurementDetailDesc', 
    					'boolIsActive'];  


}
