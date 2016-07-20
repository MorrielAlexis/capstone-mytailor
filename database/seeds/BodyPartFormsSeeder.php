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
                'strBodyFormName' =>'Flat Stomach',
                'strBodyFormImage' => 'imgBodyForms/flat-stomach',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strBodyFormID' => 'BDYFORM002',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Slight Stomach',
                'strBodyFormImage' => 'imgBodyForms/slight-tummy',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM003',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Medium Stomach',
                'strBodyFormImage' => 'imgBodyForms/medium-stomach',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strBodyFormID' => 'BDYFORM004',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Large Stomach',
                'strBodyFormImage' => 'imgBodyForms/large-stomach',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM005',
                'strBodyPartFK' => 'BDYCAT003', 
                'strBodyFormName' =>'Hefty',
                'strBodyFormImage' => 'imgBodyForms/hefty-stomach',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strBodyFormID' => 'BDYFORM006',
                'strBodyPartFK' => 'BDYCAT002', 
                'strBodyFormName' =>'Bent Back',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementback1',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM007',
                'strBodyPartFK' => 'BDYCAT002', 
                'strBodyFormName' =>'Average Back',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementback2',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM008',
                'strBodyPartFK' => 'BDYCAT002', 
                'strBodyFormName' =>'Straight Back',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementback3',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM009',
                'strBodyPartFK' => 'BDYCAT001', 
                'strBodyFormName' =>'Sloping',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementshoulder1',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM010',
                'strBodyPartFK' => 'BDYCAT001', 
                'strBodyFormName' =>'Average',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementshoulder2',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM011',
                'strBodyPartFK' => 'BDYCAT001', 
                'strBodyFormName' =>'Straight',
                'strBodyFormImage' => 'imgBodyForms/bodymeasurementshoulder3',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM012',
                'strBodyPartFK' => 'BDYCAT004', 
                'strBodyFormName' =>'Slim',
                'strBodyFormImage' => 'imgBodyForms/slim',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM013',
                'strBodyPartFK' => 'BDYCAT004', 
                'strBodyFormName' =>'Well Built',
                'strBodyFormImage' => 'imgBodyForms/well_built',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM014',
                'strBodyPartFK' => 'BDYCAT004', 
                'strBodyFormName' =>'Athletic',
                'strBodyFormImage' => 'imgBodyForms/athletic',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM015',
                'strBodyPartFK' => 'BDYCAT004', 
                'strBodyFormName' =>'Regular',
                'strBodyFormImage' => 'imgBodyForms/regular',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyFormID' => 'BDYFORM016',
                'strBodyPartFK' => 'BDYCAT004', 
                'strBodyFormName' =>'Hefty Body',
                'strBodyFormImage' => 'imgBodyForms/hefty',
                'txtBodyFormDesc' => '',
                'boolIsActive' => '1'
            )


         );

        DB::table('tblBodyPartForm')->insert($tblBodyPartForms);
    }
}
