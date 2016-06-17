<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblSegment')->delete();

        $tblSegment = array (
            array(
                'strSegmentID' => 'SEGM001',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Skirt',
                'strSegmentSex' => 'F',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Pangibabang kasuotan sa babae.',
                'boolIsActive' => '1'
            ),

            array(
                'strSegmentID' => 'SEGM002',
                'strSegCategoryFK' => 'GARM002',    
                'strSegmentName' =>'Coat',
                'strSegmentSex' => 'M',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for men.',
                'boolIsActive' => '1'
            ),

             array(
                'strSegmentID' => 'SEGM003',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Ladies Slacks',
                'strSegmentSex' => 'F',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'For ladies who prefered to wear pants instead of skirt.',
                'boolIsActive' => '1'
            ),

              array(
                'strSegmentID' => 'SEGM004',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Polo Shirt',
                'strSegmentSex' => 'M',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for mens uniform.',
                'boolIsActive' => '1'
            ),

               array(
                'strSegmentID' => 'SEGM005',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Short Sleeve Blouse',
                'strSegmentSex' => 'F',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for womens`s uniform.',
                'boolIsActive' => '1'
            ),

                array(
                'strSegmentID' => 'SEGM006',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Slacks',
                'strSegmentSex' => 'M',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Lower part wear for mens uniform.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSegment')->insert($tblSegment);
    }
}