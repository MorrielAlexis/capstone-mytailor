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
                'strSegmentImage' => 'imgSegments/female-uniform-skirt.jpg',
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
                'strSegmentImage' => 'imgSegments/blazer.jpg',
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
                'strSegmentImage' => 'imgSegments/female-uniform-pants.jpg',
                'textSegmentDesc' => 'For ladies who prefered to wear pants instead of skirt.',
                'boolIsActive' => '1'
            ),

              array(
                'strSegmentID' => 'SEGM004',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Polo Shirt',
                'dblSegmentPrice' => '500.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '5',
                'strSegmentImage' => 'imgSegments/polo-1-col.jpg',
                'textSegmentDesc' => 'Upper part wear for mens uniform.',
                'boolIsActive' => '1'
            ),

               array(
                'strSegmentID' => 'SEGM005',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Blouse',
                'dblSegmentPrice' => '550.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '4',
                'strSegmentImage' => 'imgSegments/dress1.jpg',
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
                'strSegmentImage' => 'imgSegments/ia2375-1.jpg',
                'textSegmentDesc' => 'Lower part wear for mens uniform.',
                'boolIsActive' => '1'
            ),

             array(
                'strSegmentID' => 'SEGM007',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Dress',
                'dblSegmentPrice' => '600.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '3',
                'strSegmentImage' => 'imgSegments/dressfinal.jpg',
                'textSegmentDesc' => 'Formal for womens uniform.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSegment')->insert($tblSegment);
    }
}