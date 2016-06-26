<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MeasurementDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblMeasurementDetail')->delete();

        $tblMeasurementDetail = array (
            array(
                'strMeasurementDetailID' => 'MDET001',
                'strMeasurementDetailName' => 'Length of Slevee', 
                'txtMeasurementDetailDesc' =>'For shoulder part of the polos.',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MDET002',
                'strMeasurementDetailName' => 'Waist', 
                'txtMeasurementDetailDesc' =>'For waist line purposes.',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MDET003',
                'strMeasurementDetailName' => 'Shoulder width', 
                'txtMeasurementDetailDesc' =>'For width part of the shirts.',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MDET004',
                'strMeasurementDetailName' => 'Neck circumference', 
                'txtMeasurementDetailDesc' =>'For collar part of the shirts.',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MDET005',
                'strMeasurementDetailName' => 'Bust circumference', 
                'txtMeasurementDetailDesc' =>'For the overall fit of the shirt.',
                'boolIsActive' => '1'
            ),

               array(
                'strMeasurementDetailID' => 'MDET006',
                'strMeasurementDetailName' => 'Crotch', 
                'txtMeasurementDetailDesc' =>'For the pants.',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MDET007',
                'strMeasurementDetailName' => 'Thigh', 
                'txtMeasurementDetailDesc' =>'For the overall fit of the pants in the thigh part.',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MDET008',
                'strMeasurementDetailName' => 'Hip', 
                'txtMeasurementDetailDesc' =>'For the overall fit of the bottom wear in the hip part.',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MDET009',
                'strMeasurementDetailName' => 'Pants Length', 
                'txtMeasurementDetailDesc' =>'For the length of the pants in terms of customers heigh',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MDET010',
                'strMeasurementDetailName' => 'Knee Point', 
                'txtMeasurementDetailDesc' =>'',
                'boolIsActive' => '1'
            )





        );

        DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
    }
}