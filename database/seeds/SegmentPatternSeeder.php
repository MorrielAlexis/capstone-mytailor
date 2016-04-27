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
        DB::table('tblSegmentPattern')->delete();

        $tblSegmentPattern = array (
            array(
                'strSegPatternID' => 'SPAT001',
                'strSegPCategoryFK' => 'GARM001',
                'strSegPNameFK' => 'SEGM001',
                'strSegPName' =>'Pencil Cut',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSegPatternID' => 'SPAT002',
                'strSegPCategoryFK' => 'GARM001',
                'strSegPNameFK' => 'SEGM001',
                'strSegPName'=>'Slim Fit',
                'strSegPImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSegmentPattern')->insert($tblSegmentPattern);
    }
}