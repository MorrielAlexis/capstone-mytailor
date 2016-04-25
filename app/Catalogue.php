<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
	
	protected $table = 'tblCatalogue';
	protected $primaryKey = 'strCatalogueID';
	protected $fillable = ['strCatalogueCategory',
							'strCatalogueName',
							'strCatalogueDesc',
							'strCatalogueImage',
							'boolIsActive'];

}
