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
                'strMeasGarFK' => 'GARM001',
                'strMeasSegmentNameFK' =>'SEGM001',
                'strMeasDetFK' => 'MDET001',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasCatID' => 'MEAS002',
                'strMeasGarFK' => 'GARM001',
                'strMeasSegmentNameFK' =>'SEGM001',
                'strMeasDetFK' => 'MDET002',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblMeasurementCategory')->insert($tblMeasurementCategory);
    }
}