<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SegmentPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {   
        //DB::table('tblSegmentPattern')->delete();

        $tblSegmentPattern = array (
            array(
                'strSegPatternID' => 'SPAT001',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName' =>'Shawl Type',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Type of lapel, usually use in gala nights and formal events.',
                'strSegPImage' => 'imgDesignPatterns/shawllapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT002',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Notch Type',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Lapel speacial used for every-day business suit, interview suit.',
                'strSegPImage' => 'imgDesignPatterns/notchedlapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT003',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Peak Type',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Weddings, formal dinners, black tie events or simply whenever you want to dress up a bit while turning some heads.',
                'strSegPImage' => 'imgDesignPatterns/peakedlapel.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT004',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => 'imgDesignPatterns/button-down.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT005',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Riley Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => 'imgDesignPatterns/1ButtonRileyCollar.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT006',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>' Band Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for chinese formal wears.',
                'strSegPImage' => 'imgDesignPatterns/band.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT007',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>' Italian Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for dress shirts.',
                'strSegPImage' => 'imgDesignPatterns/italiancollar.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT008',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Angle Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use as a collar for dress shirts.',
                'strSegPImage' => 'imgDesignPatterns/pocket_angle_cut.jpg',
                'boolIsActive' => '1'
            ),    

            array(
                'strSegPatternID' => 'SPAT009',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has round cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_round_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT010',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Square Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has square cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_square_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT011',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' V-Shaped Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has v-shaped cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_vshaped.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT012',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french cut.',
                'strSegPImage' => 'imgDesignPatterns/french-cut.jpg',
                'boolIsActive' => '1' 
            ), 

            array(
                'strSegPatternID' => 'SPAT013',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Round ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french round.',
                'strSegPImage' => 'imgDesignPatterns/french-round.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT014',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french square.',
                'strSegPImage' => 'imgDesignPatterns/french-square.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT015',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Portofino ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a portofino.',
                'strSegPImage' => 'imgDesignPatterns/portofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT016',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut.',
                'strSegPImage' => 'imgDesignPatterns/round-cut-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT017',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Round Cut Portofino',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut portofino.',
                'strSegPImage' => 'imgDesignPatterns/roundcutportofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT018',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Square Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a square cut.',
                'strSegPImage' => 'imgDesignPatterns/square-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT019',
                'strSegPStyleCategoryFK' => 'SEGSTY006',
                'strSegPName'=>' 1 Pleat ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 pleat',
                'strSegPImage' => 'imgDesignPatterns/1pleat.jpg',
                'boolIsActive' => '1' 
            ),        

            array(
                'strSegPatternID' => 'SPAT020',
                'strSegPStyleCategoryFK' => 'SEGSTY006',
                'strSegPName'=>' 2 Pleats ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 pleats',
                'strSegPImage' => 'imgDesignPatterns/2pleats.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT021',
                'strSegPStyleCategoryFK' => 'SEGSTY007',
                'strSegPName'=>' Vertical Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets vertically cut',
                'strSegPImage' => 'imgDesignPatterns/verticalpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT022',
                'strSegPStyleCategoryFK' => 'SEGSTY007',
                'strSegPName'=>' Sliced Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets sliced cut',
                'strSegPImage' => 'imgDesignPatterns/slicedpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT023',
                'strSegPStyleCategoryFK' => 'SEGSTY012',
                'strSegPName'=>' 1 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 backpocket',
                'strSegPImage' => 'imgDesignPatterns/1backpocket.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT024',
                'strSegPStyleCategoryFK' => 'SEGSTY012',
                'strSegPName'=>' 2 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 backpocket',
                'strSegPImage' => 'imgDesignPatterns/2backpockets.jpg',
                'boolIsActive' => '1' 
            )                                

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}