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
                'dblSegmentPrice' => '100.00',
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
                'dblSegmentPrice' => '300.00',
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
                'dblSegmentPrice' => '150.00',
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
                'dblSegmentPrice' => '100.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '5',
                'strSegmentImage' => 'imgSegments/whitepolowithblack.jpg',
                'textSegmentDesc' => 'Upper part wear for mens uniform.',
                'boolIsActive' => '1'
            ),

               array(
                'strSegmentID' => 'SEGM005',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Blouse',
                'dblSegmentPrice' => '100.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '4',
                'strSegmentImage' => 'imgSegments/whiteplainpolo.jpg',
                'textSegmentDesc' => 'Upper part wear for womens`s uniform.',
                'boolIsActive' => '1'
            ),

            array(
                'strSegmentID' => 'SEGM006',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Pants',
                'dblSegmentPrice' => '150.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '3',
                'strSegmentImage' => 'imgSegments/whitepants2.jpg',
                'textSegmentDesc' => 'Lower part wear.',
                'boolIsActive' => '1'
            ),

            //  array(
            //     'strSegmentID' => 'SEGM007',
            //     'strSegCategoryFK' => 'GARM001',    
            //     'strSegmentName' =>'Dress',
            //     'dblSegmentPrice' => '600.00',
            //     'strSegmentSex' => 'F',
            //     'intMinDays' => '3',
            //     'strSegmentImage' => 'imgSegments/dressfinal.jpg',
            //     'textSegmentDesc' => 'Formal for womens uniform.',
            //     'boolIsActive' => '1'
            // ),

            array(
                'strSegmentID' => 'SEGM008',
                'strSegCategoryFK' => 'GARM003',    
                'strSegmentName' =>'Long Sleeve Shirt',
                'dblSegmentPrice' => '150.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '3',
                'strSegmentImage' => 'imgSegments/male-uniform-plain.jpg',
                'textSegmentDesc' => 'Casual wear for men. .',
                'boolIsActive' => '1'
            ),

            array(
                'strSegmentID' => 'SEGM009',
                'strSegCategoryFK' => 'GARM001',    
                'strSegmentName' =>'Blazers',
                'dblSegmentPrice' => '300.00',
                'strSegmentSex' => 'F',
                'intMinDays' => '4',
                'strSegmentImage' => 'imgSegments/blazer-woman.jpg',
                'textSegmentDesc' => 'Upper part wear.',
                'boolIsActive' => '1'
            ),

            array(
                'strSegmentID' => 'SEGM010',
                'strSegCategoryFK' => 'GARM003',    
                'strSegmentName' =>'Polo Shirts',
                'dblSegmentPrice' => '100.00',
                'strSegmentSex' => 'M',
                'intMinDays' => '5',
                'strSegmentImage' => 'imgSegments/whitepolowithblack.jpg',
                'textSegmentDesc' => 'Upper part wear for mens uniform.',
                'boolIsActive' => '1'
            )


        );

        DB::table('tblSegment')->insert($tblSegment);
    }
}