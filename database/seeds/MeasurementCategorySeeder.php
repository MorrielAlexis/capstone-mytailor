<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MeasurementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('tblMeasurementCategory')->delete();

        $tblMeasurementCategory = array (
            array(
                'strMeasCatID' => 'MEAS001',
                'strMeasSegmentFK' =>'SEGM002',
                'strMeasDetFK' => 'MDET001',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasCatID' => 'MEAS002',
                'strMeasSegmentFK' =>'SEGM001',
                'strMeasDetFK' => 'MDET002',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasCatID' => 'MEAS003',
                'strMeasSegmentFK' =>'SEGM002',
                'strMeasDetFK' => 'MDET003',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasCatID' => 'MEAS004',
                'strMeasSegmentFK' =>'SEGM002',
                'strMeasDetFK' => 'MDET004',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasCatID' => 'MEAS005',
                'strMeasSegmentFK' =>'SEGM002',
                'strMeasDetFK' => 'MDET005',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasCatID' => 'MEAS006',
                'strMeasSegmentFK' =>'SEGM002',
                'strMeasDetFK' => 'MDET004',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasCatID' => 'MEAS007',
                'strMeasSegmentFK' =>'SEGM003',
                'strMeasDetFK' => 'MDET006',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasCatID' => 'MEAS008',
                'strMeasSegmentFK' =>'SEGM003',
                'strMeasDetFK' => 'MDET007',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasCatID' => 'MEAS009',
                'strMeasSegmentFK' =>'SEGM001',
                'strMeasDetFK' => 'MDET007',
                'boolIsActive' => '1'
            ),

              array(
                'strMeasCatID' => 'MEAS010',
                'strMeasSegmentFK' =>'SEGM001',
                'strMeasDetFK' => 'MDET010',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasCatID' => 'MEAS011',
                'strMeasSegmentFK' =>'SEGM003',
                'strMeasDetFK' => 'MDET009',
                'boolIsActive' => '1'
            ),

              array(
                'strMeasCatID' => 'MEAS012',
                'strMeasSegmentFK' =>'SEGM003',
                'strMeasDetFK' => 'MDET008',
                'boolIsActive' => '1'
            ),


        );

        DB::table('tblMeasurementCategory')->insert($tblMeasurementCategory);
    }
}