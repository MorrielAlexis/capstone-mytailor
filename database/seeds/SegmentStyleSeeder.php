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
                'strSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY002',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Cuff',
                'strSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY003',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Collar',
                'strSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY004',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Shirt Pocket',
                'strSegStyleCatDesc' => 'Perfect pairing for casual pants',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY005',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Fit',
                'strSegStyleCatDesc' => 'Either normal, slim or loose fit.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY006',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Slacks Pleat',
                'strSegStyleCatDesc' => 'Stylish detail for pants/trousers',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY007',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Slack Pockets',
                'strSegStyleCatDesc' => 'Either be vertical or sliced pockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),
 


        );

        DB::table('tblSegmentStyleCategory')->insert($tblSegmentStyleCategory);
    }
}