<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SwatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblSwatch')->delete();

        $tblSwatch = array (
            array(
                'strSwatchID' => 'SW001',
                'strSwatchTypeFK' => 'FAB001',
                'strSwatchName' =>'Linen Antique',
                'strSwatchCode' =>'LINK01',
                'strSwatchImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSwatchID' => 'SW002',
                'strSwatchTypeFK' => 'FAB002',
                'strSwatchName' =>'Cotton Classic',
                'strSwatchCode' =>'CKJK01',
                'strSwatchImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSwatch')->insert($tblSwatch);
    }
}