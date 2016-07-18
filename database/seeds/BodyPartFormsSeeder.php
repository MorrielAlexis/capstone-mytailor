<?php

use Illuminate\Database\Seeder;

class BodyPartFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblBodyPartForms = array (
            array(
                'strBodyFormID' => 'BDYFORM001',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Flat',
                'strBodyFormImage' => '',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM002',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Hefty',
                'strBodyFormImage' => '',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM003',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Slight',
                'strBodyFormImage' => '',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM004',
                'strBodyPartFK' => 'BDYCAT002', 
                'strBodyFormName' =>'Bent',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementback1',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            )

           


         );

        DB::table('tblBodyPartForms')->insert($tblBodyPartForms);
    }
}
