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

        $tblThreadCount = array (
            array(
                'strThreadCountID' => 'THRDC001',
                'strThreadCountName' => '80s',
                'txtThreadCountDesc' => 'Use for bed sheets.',
                'strThreadCountInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strThreadCountID' => 'THRDC002',
                'strThreadCountName' => '60s',
                'txtThreadCountDesc' => 'Usually use for shirts and pants.',
                'strThreadCountInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblThreadCount')->insert($tblThreadCount);
    }
    
}
