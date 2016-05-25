<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipper extends Model
{
     protected $table = 'tblZipper';

	protected $primaryKey = 'intZipperID';

	protected $fillable = array('intZipperID','strZipperBrand', 'strZipperSize',
							'strZipperColor', 'txtZipperDesc',
							'strZipperImage', 
							'strZipperInactiveReason',
							'boolIsActive');
}
