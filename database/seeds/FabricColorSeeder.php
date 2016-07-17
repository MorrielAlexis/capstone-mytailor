<?php

use Illuminate\Database\Seeder;

class FabricColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblFabricColor = array (
            array(
                'strFabricColorID' => 'FABCLR001',
                'strFabricColorName' => 'Blue',
                'txtFabricColorDesc' => 'Perfect color for summer.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricColorID' => 'FABCLR002',
                'strFabricColorName' => 'Teal',
                'txtFabricColorDesc' => 'Perfect pallette for autumn.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricColorID' => 'FABCLR003',
                'strFabricColorName' => 'Yellow',
                'txtFabricColorDesc' => 'Perfect pallette for spring.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblFabricColor')->insert($tblFabricColor);
    }
}
