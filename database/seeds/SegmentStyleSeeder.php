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
                'strSegStyleName'  =>'Coat - Lapel',
                'txtSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY002',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat - Cuff',
                'txtSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY003',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Polo Shirt - Collar',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY004',
                'strSegmentFK' => 'SEGM004',
                'strSegStyleName' =>'Polo Shirt - Shirt Pocket',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY005',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants - Fit',
                'txtSegStyleCatDesc' => 'Either normal, slim or loose fit.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegStyleCatID' => 'SEGSTY006',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants - Pants Pleat',
                'txtSegStyleCatDesc' => 'Stylish detail for pants/trousers',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY007',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants - Pants Pockets',
                'txtSegStyleCatDesc' => 'Either be vertical or sliced pockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY008',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat - Single Breasted',
                'txtSegStyleCatDesc' => 'Widely use for business and formal events. ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegStyleCatID' => 'SEGSTY009',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat - Double Breasted',
                'txtSegStyleCatDesc' => 'Widely use for business and formal events. ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegStyleCatID' => 'SEGSTY010',
                'strSegmentFK' => 'SEGM002',
                'strSegStyleName' =>'Coat - Vents',
                'txtSegStyleCatDesc' => 'Stylish accent on the back side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY011',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants - Backpockets',
                'txtSegStyleCatDesc' => 'Either 1 or 2 backpockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),
           
            array(
                'strSegStyleCatID' => 'SEGSTY012',
                'strSegmentFK' => 'SEGM006',
                'strSegStyleName' =>'Pants - Pants Bottom',
                'txtSegStyleCatDesc' => 'Either with or without cuffs.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY013',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks - Fit',
                'txtSegStyleCatDesc' => 'Either normal, slim or loose fit.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY014',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks - Pants Pleat',
                'txtSegStyleCatDesc' => 'Stylish detail for pants/trousers',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY015',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks - Pants Pockets',
                'txtSegStyleCatDesc' => 'Either be vertical or sliced pockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ), 

            array(
                'strSegStyleCatID' => 'SEGSTY016',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks - Backpockets',
                'txtSegStyleCatDesc' => 'Either 1 or 2 backpockets.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),
           
            array(
                'strSegStyleCatID' => 'SEGSTY017',
                'strSegmentFK' => 'SEGM003',
                'strSegStyleName' =>'Ladies Slacks - Pants Bottom',
                'txtSegStyleCatDesc' => 'Either with or without cuffs.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY018',
                'strSegmentFK' => 'SEGM008',
                'strSegStyleName' =>'Long Sleeve Shirt - Collar',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strSegStyleCatID' => 'SEGSTY019',
                'strSegmentFK' => 'SEGM008',
                'strSegStyleName' =>'Long Sleeve Shirt - Shirt Pocket',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY020',
                'strSegmentFK' => 'SEGM005',
                'strSegStyleName' =>'Blouse - Collars',
                'txtSegStyleCatDesc' => 'The part of a garment that encircles the neck, especially when raised or folded.',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY021',
                'strSegmentFK' => 'SEGM005',
                'strSegStyleName' =>'Blouse - Shirt Pockets',
                'txtSegStyleCatDesc' => 'Stylish accent on the chest side of the jacket.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY022',
                'strSegmentFK' => 'SEGM001',
                'strSegStyleName' =>'Skirt - Skirt Cut',
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
             
            // array(
            //     'strSegStyleCatID' => 'SEGSTY023',
            //     'strSegmentFK' => 'SEGM002',
            //     'strSegStyleName' =>'Skirt - Slit',
            //     'txtSegStyleCatDesc' => 'Stylish detail added to a skirt which is a long, narrow cut or opening.  ',
            //     'strSegStyleCatInactiveReason' => '',
            //     'boolIsActive' => '1'
            // )

            array(
                'strSegStyleCatID' => 'SEGSTY024',
                'strSegmentFK' => 'SEGM009',
                'strSegStyleName' =>'Blazer - Cuffs',
                'txtSegStyleCatDesc' => 'A fold or band serving as a trimming or finish for the bottom of a sleeve.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegStyleCatID' => 'SEGSTY025',
                'strSegmentFK' => 'SEGM009',
                'strSegStyleName' =>'Blazer - Lapel',
                'txtSegStyleCatDesc' => 'Lapels are the folded flaps of cloth on the front of a jacket or coat, and are most commonly found on formal clothing and suit jackets.  ',
                'strSegStyleCatInactiveReason' => '',
                'boolIsActive' => '1'
            ),

        );

        DB::table('tblSegmentStyleCategory')->insert($tblSegmentStyleCategory);
    }
}