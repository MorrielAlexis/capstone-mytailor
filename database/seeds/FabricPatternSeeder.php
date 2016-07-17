<?php

use Illuminate\Database\Seeder;

class FabricPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblFabricPattern = array (
            array(
                'strFabricPatternID' => 'FBRCPAT001',
                'strFabricPatternName' => 'Dots',
                'txtFabricPatternDesc' => 'Usually use for polos.',
                'strFabricPatternInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricPatternID' => 'FBRCPAT002',
                'strFabricPatternName' => 'Striped',
                'txtFabricPatternDesc' => 'Usually use for shirts and pants.',
                'strFabricPatternInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricPatternID' => 'FBRCPAT003',
                'strFabricPatternName' => 'Plain',
                'txtFabricPatternDesc' => 'Widely use for different types of garments.',
                'strFabricPatternInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblFabricPattern')->insert($tblFabricPattern);
   		 
   	}
}
    

