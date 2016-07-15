<?php

use Illuminate\Database\Seeder;

class FabricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblFabrics = array (
            array(
                'strFabricID' => 'FAB001',
                'strFabricTypeFK' => 'FABTYPE001',
                'strFabricPatternFK' =>'FBRCPAT003',
                'strFabricColorFK' => 'FABCLR001',
                'strFabricThreadCountFK' => 'THRDC002',
                'strFabricName' => 'Calvary Pink Plain',
                'dblFabricPrice' => '150',
                'strFabricCode' => 'FC01',
                'strFabricImage' => '',
                'strFabricDesc' => 'Use for school uniforms and costumes.',
                'strFabricInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricID' => 'FAB002',
                'strFabricTypeFK' => 'FABTYPE002',
                'strFabricPatternFK' =>'FBRCPAT002',
                'strFabricColorFK' => 'FABCLR002',
                'strFabricThreadCountFK' => 'THRDC001',
                'strFabricName' => 'Blue Striped Soft',
                'dblFabricPrice' => '200',
                'strFabricCode' => 'FC02',
                'strFabricImage' => '',
                'strFabricDesc' => 'Use for customize shirts and polos.',
                'strFabricInactiveReason' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strFabricID' => 'FAB003',
                'strFabricTypeFK' => 'FABTYPE003',
                'strFabricPatternFK' =>'FBRCPAT003',
                'strFabricColorFK' => 'FABCLR003',
                'strFabricThreadCountFK' => 'THRDC002',
                'strFabricName' => 'Plain Yellow Twill',
                'dblFabricPrice' => '200',
                'strFabricCode' => 'FC03',
                'strFabricImage' => '',
                'strFabricDesc' => 'Use for customize gowns and costumes.',
                'strFabricInactiveReason' => '',
                'boolIsActive' => '1'
            ),

        );

        DB::table('tblFabrics')->insert($tblFabrics);
    }
}
