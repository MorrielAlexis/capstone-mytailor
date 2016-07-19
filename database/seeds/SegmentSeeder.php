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

        $tblSegment = array (
            array(
                'strSegmentID' => 'SEGM001',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Skirt',
                'dblSegmentPrice' => '500.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '7',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Pangibabang kasuotan sa babae.',
                'boolIsActive' => '1'
            ),

            array(
                'strSegmentID' => 'SEGM002',
                'strSegCategoryFK' => 'GARM002',    
                'strSegmentName' =>'Coat',
                'dblSegmentPrice' => '750.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '7',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for men.',
                'boolIsActive' => '1'
            ),

             array(
                'strSegmentID' => 'SEGM003',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Ladies Slacks',
                'dblSegmentPrice' => '400.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '4',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'For ladies who prefered to wear pants instead of skirt.',
                'boolIsActive' => '1'
            ),

              array(
                'strSegmentID' => 'SEGM004',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Polo',
                'dblSegmentPrice' => '500.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '5',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for mens uniform.',
                'boolIsActive' => '1'
            ),

               array(
                'strSegmentID' => 'SEGM005',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Short Sleeve Blouse',
                'dblSegmentPrice' => '550.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '4',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Upper part wear for womens`s uniform.',
                'boolIsActive' => '1'
            ),

                array(
                'strSegmentID' => 'SEGM006',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Slacks',
                'dblSegmentPrice' => '700.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '3',
                'strSegmentImage' => '',
                'textSegmentDesc' => 'Lower part wear for mens uniform.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSegment')->insert($tblSegment);
    }
}