<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FabricThreadCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblSwatch')->delete();

        $tblFabricThreadCount = array (
            array(
                'strFabricThreadCountID' => 'THRDC001',
                'strFabricThreadCountName' => '80s',
                'txtFabricThreadCountDesc' => 'Use for bed sheets.',
                'strFabricThreadCountInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricThreadCountID' => 'THRDC002',
                'strFabricThreadCountName' => '60s',
                'txtFabricThreadCountDesc' => 'Usually use for shirts and pants.',
                'strFabricThreadCountInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblFabricThreadCount')->insert($tblFabricThreadCount);
    }
    
}
