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
                'strSwatchNameFK' =>'SWNAM0001',
                'strSwatchCode' =>'LINK01',
                'dblSwatchPrice' => '100.00',
                'strSwatchImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strSwatchID' => 'SW002',
                'strSwatchTypeFK' => 'FAB002',
                'strSwatchNameFK' =>'SWNAM0002',
                'strSwatchCode' =>'CKJK01',
                 'dblSwatchPrice' => '200.00',
                'strSwatchImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSwatch')->insert($tblSwatch);
    }
}