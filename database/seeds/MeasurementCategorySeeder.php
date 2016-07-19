<?php

use Illuminate\Database\Seeder;

class MeasurementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblMeasurementCategory = array (
            array(
                'strMeasurementCategoryID' => 'MEASCAT001',
                'strMeasurementCategoryName' => 'Standard Measurement', 
                'txtMeasurementCategoryDesc' =>'Measurement base from standard sizes, categorize into small,medium, large.',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementCategoryID' => 'MEASCAT002',
                'strMeasurementCategoryName' => 'Body Measurement', 
                'txtMeasurementCategoryDesc' =>'Actual measurement of the customer. Can be taken by the customer himself/herself.',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementCategoryID' => 'MEASCAT003',
                'strMeasurementCategoryName' => 'Clothing Measurement', 
                'txtMeasurementCategoryDesc' =>' Measurements from clothing which already fits the customer well.',
                'boolIsActive' => '1'
            )
            
        );

        DB::table('tblMeasurementCategory')->insert($tblMeasurementCategory);
    }
}
