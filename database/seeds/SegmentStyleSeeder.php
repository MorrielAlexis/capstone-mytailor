<?php

use Illuminate\Database\Seeder;

class SegmentStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() 
    {   
     

        $tblSegmentStyleCategory = array (
            array(
                'strSegStyleCatID' => 'SEGSTY001',
                'strSegmentFK' 	   => 'SEGM002',
                'strSegStyleName'  =>'Lapel',
                'txtSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY002',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Cuff',
                'txtSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY003',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Collar',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY004',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Shirt Pocket',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY005',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Fit',
                'txtSegStyleCatDesc' => 'Either normal, slim or loose fit.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY006',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants Pleat',
                'txtSegStyleCatDesc' => 'Stylish detail for pants/trousers',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY007',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants Pockets',
                'txtSegStyleCatDesc' => 'Either be vertical or sliced pockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY008',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Single Breasted',
                'txtSegStyleCatDesc' => 'Widely use for business and formal events. ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegStyleCatID' => 'SEGSTY009',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Double Breasted',
                'txtSegStyleCatDesc' => 'Widely use for business and formal events. ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegStyleCatID' => 'SEGSTY010',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Vents',
                'txtSegStyleCatDesc' => 'Stylish accent on the back side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY011',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Backpockets',
                'txtSegStyleCatDesc' => 'Either 1 or 2 backpockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),
           
            array(
                'strSegStyleCatID' => 'SEGSTY012',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants Bottom',
                'txtSegStyleCatDesc' => 'Either with or without cuffs.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ) 
 

        );

        DB::table('tblSegmentStyleCategory')->insert($tblSegmentStyleCategory);
    }
}