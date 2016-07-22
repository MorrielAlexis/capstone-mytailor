<?php

use Illuminate\Database\Seeder;

class MeasurementDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblMeasurementDetail = array (
            array(
                'strMeasurementDetailID' => 'MEASDET001',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET002',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET003',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Back Length',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET004',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Shoulder',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET005',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Neck',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET006',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET007',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'23',
                'dblMeasDetailMinInch' =>'14',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET008',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Outseam',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'21',
                'dblMeasDetailMinInch' =>'12',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET009',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Knee',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET010',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Thigh',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET011',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Back Rise',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'8',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET012',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Front Rise',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET013',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'26',
                'dblMeasDetailMinInch' =>'17',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET014',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Jack Length',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET015',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Wrist',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            )


        );

        DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
    }
}
