<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'tblPackages';
	protected $primaryKey = 'strPackageID';
	protected $fillable = array('strPackageID',
								'strPackageName',
								'strPackage-Seg1FK',
								'strPackage-Seg2FK',
								'strPackage-Seg3FK',
								'strPackage-Seg4FK',
								'strPackage-Seg5FK',
								'strPackageImage',
								'strPackageDesc',
								'boolIsActive'
								//
								);
}
