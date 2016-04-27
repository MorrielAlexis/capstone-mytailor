<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('tblCatalogue')->delete();

        $tblCatalogue = array (
            array(
                'strCatalogueID' => 'CAT001',
                'strCatalogueCategoryFK' => 'GARM001',
                'strCatalogueName' =>'JS Promenade Dress',
                'strCatalogueDesc' =>'Clothing for promenade and special events.',
                'strCatalogueImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT002',
                'strCatalogueCategoryFK' => 'GARM001',
                'strCatalogueName' =>'Conference Formal Attire',
                'strCatalogueDesc' =>' Suits used by men for formal events.',
                'strCatalogueImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblCatalogue')->insert($tblCatalogue);
    }
}