<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialNeedleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
      //  DB::table('tblNeedle')->delete();

        $tblNeedle = array (
            array(
                'intNeedleID' => '001',
                'strNeedleBrand' => 'Classic Big',
                'strNeedleSize' => 'Big',
                'strNeedleDesc' => 'For large comforters',
                'strNeedleImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'intNeedleID' => '002',
                'strNeedleBrand' => 'Sharp Classic',
                'strNeedleSize' => 'Small',
                'strNeedleDesc' => 'For mass production',
                'strNeedleImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblNeedle')->insert($tblNeedle);
    }
}