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
                'strSegPatternID' => 'SPAT0001',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName' =>'Shawl Type',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Type of lapel, usually use in gala nights and formal events.',
                'strSegPImage' => 'imgDesignPatterns/shawllapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0002',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Notch Type',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Lapel speacial used for every-day business suit, interview suit.',
                'strSegPImage' => 'imgDesignPatterns/notchedlapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0003',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Peak Type',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Weddings, formal dinners, black tie events or simply whenever you want to dress up a bit while turning some heads.',
                'strSegPImage' => 'imgDesignPatterns/peakedlapel.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0004',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => 'imgDesignPatterns/button-down.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0005',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Riley Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => 'imgDesignPatterns/1ButtonRileyCollar.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0006',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>' Band Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for chinese formal wears.',
                'strSegPImage' => 'imgDesignPatterns/band.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0007',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>' Italian Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for dress shirts.',
                'strSegPImage' => 'imgDesignPatterns/italiancollar.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0008',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Angle Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use as a collar for dress shirts.',
                'strSegPImage' => 'imgDesignPatterns/pocket_angle_cut.jpg',
                'boolIsActive' => '1'
            ),    

            array(
                'strSegPatternID' => 'SPAT0009',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has round cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_round_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0010',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' Square Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has square cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_square_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0011',
                'strSegPStyleCategoryFK' => 'SEGSTY004',
                'strSegPName'=>' V-Shaped Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has v-shaped cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_vshaped.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0012',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french cut.',
                'strSegPImage' => 'imgDesignPatterns/french-cut.jpg',
                'boolIsActive' => '1' 
            ), 

            array(
                'strSegPatternID' => 'SPAT0013',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Round ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french round.',
                'strSegPImage' => 'imgDesignPatterns/french-round.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0014',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' French Square ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french square.',
                'strSegPImage' => 'imgDesignPatterns/french-square.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0015',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Portofino ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a portofino.',
                'strSegPImage' => 'imgDesignPatterns/portofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0016',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut.',
                'strSegPImage' => 'imgDesignPatterns/round-cut-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0017',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Round Cut Portofino',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut portofino.',
                'strSegPImage' => 'imgDesignPatterns/roundcutportofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0018',
                'strSegPStyleCategoryFK' => 'SEGSTY002',
                'strSegPName'=>' Square Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a square cut.',
                'strSegPImage' => 'imgDesignPatterns/square-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0019',
                'strSegPStyleCategoryFK' => 'SEGSTY006',
                'strSegPName'=>' 1 Pleat ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 pleat',
                'strSegPImage' => 'imgDesignPatterns/1pleat.jpg',
                'boolIsActive' => '1' 
            ),        

            array(
                'strSegPatternID' => 'SPAT0020',
                'strSegPStyleCategoryFK' => 'SEGSTY006',
                'strSegPName'=>' 2 Pleats ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 pleats',
                'strSegPImage' => 'imgDesignPatterns/2pleats.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0021',
                'strSegPStyleCategoryFK' => 'SEGSTY007',
                'strSegPName'=>' Vertical Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets vertically cut',
                'strSegPImage' => 'imgDesignPatterns/verticalpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0022',
                'strSegPStyleCategoryFK' => 'SEGSTY007',
                'strSegPName'=>' Sliced Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets sliced cut',
                'strSegPImage' => 'imgDesignPatterns/slicedpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0023',
                'strSegPStyleCategoryFK' => 'SEGSTY011',
                'strSegPName'=>' 1 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 backpocket',
                'strSegPImage' => 'imgDesignPatterns/1backpocket.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0024',
                'strSegPStyleCategoryFK' => 'SEGSTY011',
                'strSegPName'=>' 2 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 backpocket',
                'strSegPImage' => 'imgDesignPatterns/2backpockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0025',
                'strSegPStyleCategoryFK' => 'SEGSTY019',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => 'imgDesignPatterns/button-down.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0026',
                'strSegPStyleCategoryFK' => 'SEGSTY019',
                'strSegPName'=>'Riley Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => 'imgDesignPatterns/1ButtonRileyCollar.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0027',
                'strSegPStyleCategoryFK' => 'SEGSTY019',
                'strSegPName'=>' Band Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for chinese formal wears.',
                'strSegPImage' => 'imgDesignPatterns/band.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0028',
                'strSegPStyleCategoryFK' => 'SEGSTY019',
                'strSegPName'=>' Italian Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for dress shirts.',
                'strSegPImage' => 'imgDesignPatterns/italiancollar.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0029',
                'strSegPStyleCategoryFK' => 'SEGSTY022',
                'strSegPName'=>'Pencil Cut',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use as a cut for formal skirts.',
                'strSegPImage' => 'imgDesignPatterns/skirt-pencil.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0030',
                'strSegPStyleCategoryFK' => 'SEGSTY022',
                'strSegPName'=>'Bubble Cut',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use as a cut for dancing skirts.',
                'strSegPImage' => 'imgDesignPatterns/skirt-bubble.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0031',
                'strSegPStyleCategoryFK' => 'SEGSTY022',
                'strSegPName'=>'Panelled Cut',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use as a cut for uniform skirts.',
                'strSegPImage' => 'imgDesignPatterns/skirt-paneled.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0032',
                'strSegPStyleCategoryFK' => 'SEGSTY022',
                'strSegPName'=>'Ruffled Cut',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a cut for party skirts.',
                'strSegPImage' => 'imgDesignPatterns/skirt-ruffled.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0033',
                'strSegPStyleCategoryFK' => 'SEGSTY008',
                'strSegPName'=>'1 Button',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Usually use  for slim person.',
                'strSegPImage' => 'imgDesignPatterns/single-1.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0034',
                'strSegPStyleCategoryFK' => 'SEGSTY008',
                'strSegPName'=>'2 Button',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Usually use  for regular size person.',
                'strSegPImage' => 'imgDesignPatterns/single-2.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0035',
                'strSegPStyleCategoryFK' => 'SEGSTY008',
                'strSegPName'=>'3 Button',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Usually use  for regular hefty person.',
                'strSegPImage' => 'imgDesignPatterns/single-3.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0036',
                'strSegPStyleCategoryFK' => 'SEGSTY009',
                'strSegPName'=>'6 Buttons A',
                'dblPatternPrice' => '100',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/6buttons-A.jpg',
                'boolIsActive' => '1'
            ), 

            array(
                'strSegPatternID' => 'SPAT0037',
                'strSegPStyleCategoryFK' => 'SEGSTY009',
                'strSegPName'=>'6 Buttons B',
                'dblPatternPrice' => '100',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/6buttonjacketmediumlapels.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0038',
                'strSegPStyleCategoryFK' => 'SEGSTY010',
                'strSegPName'=>'Round Edge',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/round-edge.jpg',
                'boolIsActive' => '1'
            ),   

            array(
                'strSegPatternID' => 'SPAT0039',
                'strSegPStyleCategoryFK' => 'SEGSTY010',
                'strSegPName'=>'Right Angled Edge',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/rightangled-edge.jpg',
                'boolIsActive' => '1'
            ),  

            // array(
            //     'strSegPatternID' => 'SPAT0040',
            //     'strSegPStyleCategoryFK' => 'SEGSTY023',
            //     'strSegPName'=>'No Vent',
            //     'dblPatternPrice' => '10',
            //     'txtSegPDesc' => 'Usually use  for winter.',
            //     'strSegPImage' => 'imgDesignPatterns/novent.jpg',
            //     'boolIsActive' => '1'
            // ),

            // array(
            //     'strSegPatternID' => 'SPAT0041',
            //     'strSegPStyleCategoryFK' => 'SEGSTY023',
            //     'strSegPName'=>'Center Vent',
            //     'dblPatternPrice' => '50',
            //     'txtSegPDesc' => 'Usually use  for winter.',
            //     'strSegPImage' => 'imgDesignPatterns/centervents.jpg',
            //     'boolIsActive' => '1'
            // ),  

            // array(
            //     'strSegPatternID' => 'SPAT0042',
            //     'strSegPStyleCategoryFK' => 'SEGSTY023',
            //     'strSegPName'=>'Side Vent',
            //     'dblPatternPrice' => '50',
            //     'txtSegPDesc' => 'Usually use  for winter.',
            //     'strSegPImage' => 'imgDesignPatterns/sidevents.jpg',
            //     'boolIsActive' => '1'
            // ), 

            array(
                'strSegPatternID' => 'SPAT0040',
                'strSegPStyleCategoryFK' => 'SEGSTY023',
                'strSegPName'=>'No Vent',
                'dblPatternPrice' => '10',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/novent.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0041',
                'strSegPStyleCategoryFK' => 'SEGSTY023',
                'strSegPName'=>'Center Vent',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/centervents.jpg',
                'boolIsActive' => '1'
            ),  

            array(
                'strSegPatternID' => 'SPAT0042',
                'strSegPStyleCategoryFK' => 'SEGSTY023',
                'strSegPName'=>'Side Vent',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Usually use  for winter.',
                'strSegPImage' => 'imgDesignPatterns/sidevents.jpg',
                'boolIsActive' => '1'
            ), 


            array(
                'strSegPatternID' => 'SPAT0043',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' French Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french cut.',
                'strSegPImage' => 'imgDesignPatterns/french-cut.jpg',
                'boolIsActive' => '1' 
            ), 

            array(
                'strSegPatternID' => 'SPAT0044',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' French Round ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french round.',
                'strSegPImage' => 'imgDesignPatterns/french-round.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0045',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' French Square ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a french square.',
                'strSegPImage' => 'imgDesignPatterns/french-square.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0046',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' Portofino ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a portofino.',
                'strSegPImage' => 'imgDesignPatterns/portofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0047',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut.',
                'strSegPImage' => 'imgDesignPatterns/round-cut-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0048',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' Round Cut Portofino',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut portofino.',
                'strSegPImage' => 'imgDesignPatterns/roundcutportofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0049',
                'strSegPStyleCategoryFK' => 'SEGSTY024',
                'strSegPName'=>' Square Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a square cut.',
                'strSegPImage' => 'imgDesignPatterns/square-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0050',
                'strSegPStyleCategoryFK' => 'SEGSTY020',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => 'imgDesignPatterns/button-down.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0051',
                'strSegPStyleCategoryFK' => 'SEGSTY020',
                'strSegPName'=>'Riley Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => 'imgDesignPatterns/1ButtonRileyCollar.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0052',
                'strSegPStyleCategoryFK' => 'SEGSTY012',
                'strSegPName'=>'With Cuffs',
                'dblPatternPrice' => '40',
                'txtSegPDesc' => 'Usually use as a lining for pants.',
                'strSegPImage' => 'imgDesignPatterns/withcuffs.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0053',
                'strSegPStyleCategoryFK' => 'SEGSTY012',
                'strSegPName'=>'Without Cuffs',
                'dblPatternPrice' => '40',
                'txtSegPDesc' => 'Usually use as a lining for pants.',
                'strSegPImage' => 'imgDesignPatterns/withoutcuffs.jpg',
                'boolIsActive' => '1'
            ),

             array(
                'strSegPatternID' => 'SPAT0054',
                'strSegPStyleCategoryFK' => 'SEGSTY025',
                'strSegPName' =>'Shawl Type',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Type of lapel, usually use in gala nights and formal events.',
                'strSegPImage' => 'imgDesignPatterns/shawllapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0055',
                'strSegPStyleCategoryFK' => 'SEGSTY025',
                'strSegPName'=>'Notch Type',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Lapel speacial used for every-day business suit, interview suit.',
                'strSegPImage' => 'imgDesignPatterns/notchedlapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0056',
                'strSegPStyleCategoryFK' => 'SEGSTY025',
                'strSegPName'=>'Peak Type',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Weddings, formal dinners, black tie events or simply whenever you want to dress up a bit while turning some heads.',
                'strSegPImage' => 'imgDesignPatterns/peakedlapel.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0057',
                'strSegPStyleCategoryFK' => 'SEGSTY021',
                'strSegPName'=>' Round Cuts ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has round cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_round_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0058',
                'strSegPStyleCategoryFK' => 'SEGSTY021',
                'strSegPName'=>' Square Cuts ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A pocket on a shirt that has square cut.',
                'strSegPImage' => 'imgDesignPatterns/pocket_square_cut.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0059',
                'strSegPStyleCategoryFK' => 'SEGSTY005',
                'strSegPName'=>' Portofino ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a portofino.',
                'strSegPImage' => 'imgDesignPatterns/portofino.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0060',
                'strSegPStyleCategoryFK' => 'SEGSTY005',
                'strSegPName'=>' Round Cut ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'A cuff that is a round cut.',
                'strSegPImage' => 'imgDesignPatterns/round-cut-1-button.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0061',
                'strSegPStyleCategoryFK' => 'SEGSTY018',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => 'imgDesignPatterns/button-down.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0062',
                'strSegPStyleCategoryFK' => 'SEGSTY018',
                'strSegPName'=>'Riley Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => 'imgDesignPatterns/1ButtonRileyCollar.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0063',
                'strSegPStyleCategoryFK' => 'SEGSTY018',
                'strSegPName'=>' Band Collar',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for chinese formal wears.',
                'strSegPImage' => 'imgDesignPatterns/band.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0064',
                'strSegPStyleCategoryFK' => 'SEGSTY013',
                'strSegPName'=>'A-line',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use for formal events.',
                'strSegPImage' => 'imgDesignPatterns/a-line.jpg',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT0065',
                'strSegPStyleCategoryFK' => 'SEGSTY013',
                'strSegPName'=> 'Ball Gown',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Use for parties and debuts.',
                'strSegPImage' => 'imgDesignPatterns/ball-gown.jpg',
                'boolIsActive' => '1'
            ),

             array(
                'strSegPatternID' => 'SPAT0066',
                'strSegPStyleCategoryFK' => 'SEGSTY015',
                'strSegPName'=>' Vertical Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets vertically cut',
                'strSegPImage' => 'imgDesignPatterns/verticalpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0067',
                'strSegPStyleCategoryFK' => 'SEGSTY015',
                'strSegPName'=>' Sliced Pockets ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants pockets sliced cut',
                'strSegPImage' => 'imgDesignPatterns/slicedpantspockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0068',
                'strSegPStyleCategoryFK' => 'SEGSTY014',
                'strSegPName'=>' 1 Pleat ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 pleat',
                'strSegPImage' => 'imgDesignPatterns/1pleat.jpg',
                'boolIsActive' => '1' 
            ),        

            array(
                'strSegPatternID' => 'SPAT0069',
                'strSegPStyleCategoryFK' => 'SEGSTY014',
                'strSegPName'=>' 2 Pleats ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 pleats',
                'strSegPImage' => 'imgDesignPatterns/2pleats.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0070',
                'strSegPStyleCategoryFK' => 'SEGSTY016',
                'strSegPName'=>' 1 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 1 backpocket',
                'strSegPImage' => 'imgDesignPatterns/1backpocket.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0071',
                'strSegPStyleCategoryFK' => 'SEGSTY016',
                'strSegPName'=>' 2 Back Pocket ',
                'dblPatternPrice' => '50',
                'txtSegPDesc' => 'Pants with 2 backpocket',
                'strSegPImage' => 'imgDesignPatterns/2backpockets.jpg',
                'boolIsActive' => '1' 
            ),

            array(
                'strSegPatternID' => 'SPAT0072',
                'strSegPStyleCategoryFK' => 'SEGSTY017',
                'strSegPName'=>'With Cuffs',
                'dblPatternPrice' => '40',
                'txtSegPDesc' => 'Usually use as a lining for pants.',
                'strSegPImage' => 'imgDesignPatterns/withcuffs.jpg',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT0073',
                'strSegPStyleCategoryFK' => 'SEGSTY017',
                'strSegPName'=>'Without Cuffs',
                'dblPatternPrice' => '40',
                'txtSegPDesc' => 'Usually use as a lining for pants.',
                'strSegPImage' => 'imgDesignPatterns/withoutcuffs.jpg',
                'boolIsActive' => '1'
            ),                                

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}