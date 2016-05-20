<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SwatchNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblSwatch')->delete();

        $tblSwatchName = array (
            array(
                'strSwatchNameID' => 'SWNAM0001',
                'strSName' => 'Citadel Silk',
                'txtSwatchNameDesc' =>'A smooth version of citadel.',
                'boolIsActive' => '1'
            ),

            array(
                'strSwatchNameID' => 'SWNAM0002',
                'strSName' => 'Antique',
                'txtSwatchNameDesc' =>'An antique version of silk.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblSwatchName')->insert($tblSwatchName);
    }
}