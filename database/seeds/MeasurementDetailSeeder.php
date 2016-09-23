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
                'strMeasurementDetailID' => 'MEASDET0001',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/body-chest.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0002',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/hips-body.jpg',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0003',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Back Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shirtlengthbody.jpg',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0004',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Shoulder',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shoulderbody.jpg',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0005',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Neck',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/neckneck.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0006',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0007',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'23',
                'dblMeasDetailMinInch' =>'14',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0008',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Outseam(Pants Length)',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'21',
                'dblMeasDetailMinInch' =>'12',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0009',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Knee',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0010',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Thigh',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0011',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Back Rise',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'8',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0012',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Front Rise',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0013',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'26',
                'dblMeasDetailMinInch' =>'17',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0014',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Leg Opening',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0015',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0016',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0017',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0018',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0019',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Thigh Width',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0020',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Pants Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0021',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0022',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Half Hem',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0023',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'23',
                'dblMeasDetailMinInch' =>'14',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0024',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Outseam(Pants Length)',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'21',
                'dblMeasDetailMinInch' =>'12',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0025',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Knee',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0026',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Thigh',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0027',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Back Rise',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'15',
                'dblMeasDetailMinInch' =>'8',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0028',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Front Rise',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0029',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'26',
                'dblMeasDetailMinInch' =>'17',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0030',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Leg Opening',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'20',
                'dblMeasDetailMinInch' =>'11',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0031',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0032',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0033',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0034',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0035',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Thigh Width',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0036',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Pants Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0037',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0038',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Half Hem',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0039',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Chest',
                'txtMeasDetailDesc' =>'Button the shirt and lay it flat. Then measure from edge to edge just below the armpit. ',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0040',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Waist',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure from edge to edge at the waistline. (Measure at the narrowest point of the waist or mid-torso of the shirt.)',
                 'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0041',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Hips',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure from edge to edge at the base of the shirt.',
                  'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0042',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Sleeve Length',
                'txtMeasDetailDesc' =>'Lay the sleeve flat and measure along the outside edge (opposite to the sleeve seam) from the top of the shoulder (starting at the seam) to the end of the cuff. ',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0043',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Collar',
                'txtMeasDetailDesc' =>'The collar measurement should be taken from the middle of the button hole to the center of the collar button when the collar is spread flat. ',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0044',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT003',
                'strMeasDetailName' =>'Half Bicep',
                'txtMeasDetailDesc' =>'With the shirt laid flat, measure the width of your sleeve at the upper arm. This is normally taken about 15cm to 18 cm from the tip of the shoulder seam. This is the sleeve width of the largest part of your arm/sleeve. ',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0045',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/body-chest.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0046',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/hips-body.jpg',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0047',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Back Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shirtlengthbody.jpg',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0048',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Shoulder',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shoulderbody.jpg',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0049',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Neck',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/neckneck.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0050',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0051',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Wrist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0052',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Elbow',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0053',
                'strMeasDetSegmentFK' => 'SEGM001', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist Line',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0054',
                'strMeasDetSegmentFK' => 'SEGM001', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Skirt Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0055',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Waist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0056',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0057',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Crotch',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0058',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Thigh Width',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0059',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Pants Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0060',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Inseam',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0061',
                'strMeasDetSegmentFK' => 'SEGM003', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Half Hem',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'10',
                'dblMeasDetailMinInch' =>'1',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0062',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/body-chest.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0063',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/hips-body.jpg',
                'dblMeasDetailMinCm' =>'37',
                'dblMeasDetailMinInch' =>'28',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0064',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Back Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shirtlengthbody.jpg',
                'dblMeasDetailMinCm' =>'28',
                'dblMeasDetailMinInch' =>'19',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0065',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Shoulder',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/shoulderbody.jpg',
                'dblMeasDetailMinCm' =>'16',
                'dblMeasDetailMinInch' =>'7',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0066',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Neck',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => 'imgMeasurementDetails/neckneck.jpg',
                'dblMeasDetailMinCm' =>'14.5',
                'dblMeasDetailMinInch' =>'5.51',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0067',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0068',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Neck',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0069',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0070',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Stomach',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0071',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0072',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Coat Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0073',
                'strMeasDetSegmentFK' => 'SEGM002', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Should Width',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0078',
                'strMeasDetSegmentFK' => 'SEGM004', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Sleeve Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0079',
                'strMeasDetSegmentFK' => 'SEGM005', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0080',
                'strMeasDetSegmentFK' => 'SEGM006', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Wrist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

              array(
                'strMeasurementDetailID' => 'MEASDET0081',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Chest',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0082',
                'strMeasDetSegmentFK' => 'SEGM007', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Stomach',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

             array(
                'strMeasurementDetailID' => 'MEASDET0083',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Hips',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),


            array(
                'strMeasurementDetailID' => 'MEASDET0084',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Coat Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0085',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Should Width',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0086',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Sleeve Length',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0087',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Bicep',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            ),

            array(
                'strMeasurementDetailID' => 'MEASDET0088',
                'strMeasDetSegmentFK' => 'SEGM008', 
                'strMeasCategoryFK' =>'MEASCAT002',
                'strMeasDetailName' =>'Wrist',
                'txtMeasDetailDesc' =>'',
                'strMeaDetailImage' => '',
                'dblMeasDetailMinCm' =>'11',
                'dblMeasDetailMinInch' =>'2',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblMeasurementDetail')->insert($tblMeasurementDetail);
    }
}
