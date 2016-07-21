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
            )

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}