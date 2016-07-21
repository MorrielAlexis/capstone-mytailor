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
            ),

            array(
                'strFabricColorID' => 'FABCLR004',
                'strFabricColorName' => 'Rainbow',
                'txtFabricColorDesc' => 'Perfect pallette for summer.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricColorID' => 'FABCLR005',
                'strFabricColorName' => 'Red',
                'txtFabricColorDesc' => 'Perfect pallette for love season.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

             array(
                'strFabricColorID' => 'FABCLR006',
                'strFabricColorName' => 'Black',
                'txtFabricColorDesc' => 'Perfect color for formal events.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            ),

             array(
                'strFabricColorID' => 'FABCLR007',
                'strFabricColorName' => 'Gray',
                'txtFabricColorDesc' => 'Perfect pallette for business attires.',
                'strFabricColorInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblFabricColor')->insert($tblFabricColor);
    }
}
