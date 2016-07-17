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
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT002',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Notch Type',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Lapel speacial used for every-day business suit, interview suit.',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT003',
                'strSegPStyleCategoryFK' => 'SEGSTY001',
                'strSegPName'=>'Peak Type',
                'dblPatternPrice' => '80',
                'txtSegPDesc' => 'Weddings, formal dinners, black tie events or simply whenever you want to dress up a bit while turning some heads.',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strSegPatternID' => 'SPAT004',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Button Down',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'A collar on a shirt that has the pointed ends fastened to the shirt by buttons',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT005',
                'strSegPStyleCategoryFK' => 'SEGSTY003',
                'strSegPName'=>'Classic Small',
                'dblPatternPrice' => '70',
                'txtSegPDesc' => 'Usually use as a collar for tuxedos.',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}