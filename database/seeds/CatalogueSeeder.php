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
       // DB::table('tblCatalogue')->delete();

        $tblCatalogue = array (
            array(
                'strCatalogueID' => 'CAT001',
                'strCatalogueCategoryFK' => 'GARM003',
                'strCatalogueName' =>'Casual Polo 1',
                'strCatalogueDesc' =>'Clothing for meeting and special events.',
                'strCatalogueImage' => 'imgCatalogue/shirt-showcase1.gif',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT002',
                'strCatalogueCategoryFK' => 'GARM003',
                'strCatalogueName' =>' Casual Polo 2',
                'strCatalogueDesc' =>' Polo used by men for semi-formal events.',
                'strCatalogueImage' => 'imgCatalogue/shirt-showcase3.gif',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT003',
                'strCatalogueCategoryFK' => 'GARM003',
                'strCatalogueName' =>' Casual Polo 3',
                'strCatalogueDesc' =>' Polo used by men for semi-formal events.',
                'strCatalogueImage' => 'imgCatalogue/shirt-showcase7.gif',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT004',
                'strCatalogueCategoryFK' => 'GARM005',
                'strCatalogueName' =>' Casual Blouse 1',
                'strCatalogueDesc' =>' Blouse used by women for semi-formal events.',
                'strCatalogueImage' => 'imgCatalogue/women-polo-design-2.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT005',
                'strCatalogueCategoryFK' => 'GARM005',
                'strCatalogueName' =>' Casual Blouse 2',
                'strCatalogueDesc' =>' Blouse used by women for semi-formal events.',
                'strCatalogueImage' => 'imgCatalogue/women-polo-design-3.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT006',
                'strCatalogueCategoryFK' => 'GARM005',
                'strCatalogueName' =>' Casual Blouse 3',
                'strCatalogueDesc' =>' Blouse used by women for semi-formal events.',
                'strCatalogueImage' => 'imgCatalogue/female-uniform-plain.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strCatalogueID' => 'CAT007',
                'strCatalogueCategoryFK' => 'GARM004',
                'strCatalogueName' =>'Mens Slacks',
                'strCatalogueDesc' =>'Daily use for business attire. ',
                'strCatalogueImage' => 'imgCatalogue/male-uniform-pants-plain.jpg',
                'boolIsActive' => '1'
            ),

             array(
                'strCatalogueID' => 'CAT008',
                'strCatalogueCategoryFK' => 'GARM002',
                'strCatalogueName' =>'Double Breasted 1',
                'strCatalogueDesc' =>'Daily use for business attire. ',
                'strCatalogueImage' => 'imgCatalogue/suit5.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT009',
                'strCatalogueCategoryFK' => 'GARM002',
                'strCatalogueName' =>'Shawl Lapel Suit',
                'strCatalogueDesc' =>'Daily use for gala attire. ',
                'strCatalogueImage' => 'imgCatalogue/s3366_main.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strCatalogueID' => 'CAT010',
                'strCatalogueCategoryFK' => 'GARM002',
                'strCatalogueName' =>'Notch Lapel Suit',
                'strCatalogueDesc' =>'Daily use for job attire. ',
                'strCatalogueImage' => 'imgCatalogue/suit3.jpg',
                'boolIsActive' => '1'
            )


        );

        DB::table('tblCatalogue')->insert($tblCatalogue);
    }
}