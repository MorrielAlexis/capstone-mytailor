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
        DB::table('tblMeasurementDetail')->delete();

        $tblMeasurementDetail = array (
            array(
                'strMeasurementDetailID' => 'MDET001',
                'strMeasurementDetailName' => 'Slevee', 
                'txtMeasurementDetailDesc' =>'For shoulder part of the polos.',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MDET002',
                'strMeasurementDetailName' => 'Waist', 
                'txtMeasurementDetailDesc' =>'For waist line purposes.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
    }
}