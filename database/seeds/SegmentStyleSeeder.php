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
                'strSegStyleName'  =>'Coat Lapel',
                'txtSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY002',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat Cuff',
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
                'strSegmentFK' => 'SEGM008',
                'strSegStyleName' =>'Long Sleeve Cuff',
                'txtSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve',
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
                'strSegStyleName' =>'Coat Bottoms',
                'txtSegStyleCatDesc' => 'Stylish accent on the bottom side of the jacket.  ',
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
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY013',
                'strSegmentFK' => 'SEGM007',
                'strSegStyleName' =>'Sheath',
                'txtSegStyleCatDesc' => 'No waistline seam. They hang from the shoulders and have inward shaping at the waist.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY014',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks Pleat',
                'txtSegStyleCatDesc' => 'Stylish detail for pants/trousers',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY015',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks Pockets',
                'txtSegStyleCatDesc' => 'Either be vertical or sliced pockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ), 

            array(
                'strSegStyleCatID' => 'SEGSTY016',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks Backpockets',
                'txtSegStyleCatDesc' => 'Either 1 or 2 backpockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),
           
            array(
                'strSegStyleCatID' => 'SEGSTY017',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks Bottom',
                'txtSegStyleCatDesc' => 'Either with or without cuffs.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY018',
                'strSegmentFK' => 'SEGM008',
                'strSegStyleName' =>'Long Sleeve Collar',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY019',
                'strSegmentFK' => 'SEGM008',
                'strSegStyleName' =>'Long Sleeve Pocket',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY020',
                'strSegmentFK' => 'SEGM005',
                'strSegStyleName' =>'Blouse Collars',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY021',
                'strSegmentFK' => 'SEGM005',
                'strSegStyleName' =>'Blouse Pockets',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY022',
                'strSegmentFK' => 'SEGM001',
                'strSegStyleName' =>'Skirt Cut',
                'txtSegStyleCatDesc' => 'Stylish cut on the skirt.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY023',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat Vents',
                'txtSegStyleCatDesc' => 'Widely use for accent at the back of the coat. ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY024',
                'strSegmentFK' => 'SEGM009',
                'strSegStyleName' =>'Blazer Cuffs',
                'txtSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY025',
                'strSegmentFK'     => 'SEGM009',
                'strSegStyleName'  =>'Blazer Lapel',
                'txtSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            )

            


             

        );

        DB::table('tblSegmentStyleCategory')->insert($tblSegmentStyleCategory);
    }
}