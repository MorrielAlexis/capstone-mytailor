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
                'strMeasDetailName' =>'Outseam(Pants Length)',
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
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'26',
                'dblMeasDetailMinInch' =>'17',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET014',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Leg Opening',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET015',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET016',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET017',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET018',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET019',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Thigh Width',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET020',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Pants Length',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET021',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET022',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Half Hem',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET023',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'23',
                'dblMeasDetailMinInch' =>'14',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET024',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Outseam(Pants Length)',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'21',
                'dblMeasDetailMinInch' =>'12',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET025',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Knee',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET026',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Thigh',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET027',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Back Rise',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'8',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET028',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Front Rise',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET029',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'26',
                'dblMeasDetailMinInch' =>'17',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET030',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Leg Opening',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET031',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET032',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET033',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET034',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET035',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Thigh Width',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET036',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Pants Length',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET037',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET038',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Half Hem',
                'txtMeasDetailDesc' =>'',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET039',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Chest',
                'txtMeasDetailDesc' =>'Button the shirt and lay it flat. Then measure from edge to edge just below the armpit. ',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET040',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure from edge to edge at the waistline. (Measure at the narrowest point of the waist or mid-torso of the shirt.)',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET041',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Hips',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure from edge to edge at the base of the shirt.',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET042',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Sleeve Length',
                'txtMeasDetailDesc' =>'Lay the sleeve flat and measure along the outside edge (opposite to the sleeve seam) from the top of the shoulder (starting at the seam) to the end of the cuff. ',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET043',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Collar',
                'txtMeasDetailDesc' =>'The collar measurement should be taken from the middle of the button hole to the center of the collar button when the collar is spread flat. ',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET044',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Bicep',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure the width of your sleeve at the upper arm. This is normally taken about 15cm to 18 cm from the tip of the shoulder seam. This is the sleeve width of the largest part of your arm/sleeve. ',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),



        );

        DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
    }
}
