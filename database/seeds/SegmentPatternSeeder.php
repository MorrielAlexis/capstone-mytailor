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
                'strSegPNameFK' => 'SEGM001',
                'strSegPName' =>'Pencil Cut',
                'strSegPDesc' => '',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT002',
                'strSegPNameFK' => 'SEGM002',
                'strSegPName'=>'Slim Fit',
                'strSegPDesc' => '',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}