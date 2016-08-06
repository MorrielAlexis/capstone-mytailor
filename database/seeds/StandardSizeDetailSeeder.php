<?php

use Illuminate\Database\Seeder;

class StandardSizeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    	$tblStandardSizeDetail = array (
            array(
                'strStandardSizeDetID' => 'STDRDSZDET001',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'8',
                'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET002',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Normal Fit',
                'dblStanSizeInch' =>'9',
                'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET003',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'10',
                'dblStanSizeCm' => '26',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET004',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Normal Fit',
                'dblStanSizeInch' =>'10',
                'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET005',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE005',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'17.75',
                'dblStanSizeCm' => '24.75',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET006',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE004',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'10',
                'dblStanSizeCm' => '14',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET007',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'11',
                'dblStanSizeCm' => '12',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET008',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Shirt Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'10',
                'dblStanSizeCm' => '29',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET009',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Shirt Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'13',
                'dblStanSizeCm' => '30',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET010',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE003',
                'strStanSizeDetailName' =>'Shirt Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'12',
                'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strStandardSizeDetID' => 'STDRDSZDET011',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE004',
                'strStanSizeDetailName' =>'Shirt Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'12',
                'dblStanSizeCm' => '29',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET012',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE005',
                'strStanSizeDetailName' =>'Shirt Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'11',
                'dblStanSizeCm' => '28',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET013',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'14',
                'dblStanSizeCm' => '29',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

              array(
                'strStandardSizeDetID' => 'STDRDSZDET014',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'17',
                'dblStanSizeCm' => '31',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET015',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE003',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'18',
                'dblStanSizeCm' => '32',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET016',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE004',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'15.5',
                 'dblStanSizeCm' => '32',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

              array(
                'strStandardSizeDetID' => 'STDRDSZDET017',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE005',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'20.5',
                'dblStanSizeCm' => '12.1',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET018',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE006',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'16',
                'dblStanSizeCm' => '28',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET019',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE006',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'13',
                'dblStanSizeCm' => '23',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET020',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE006',
                'strStanSizeDetailName' =>'Shoulder Width',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'14',
                 'dblStanSizeCm' => '28',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET021',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'5',
                 'dblStanSizeCm' => '19',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET022',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'16',
                 'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET023',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE003',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'9',
                 'dblStanSizeCm' => '27',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET024',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE004',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'10',
                 'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET025',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE005',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'8',
                 'dblStanSizeCm' => '21',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET026',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE006',
                'strStanSizeDetailName' =>'Sleeve Length',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'7',
                 'dblStanSizeCm' => '21',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET027',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Chest',
                'strStanSizeFitType' =>'Slim Fit',
                'dblStanSizeInch' =>'12',
                 'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET028',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Chest',
                'strStanSizeFitType' =>'Normal Fit',
                'dblStanSizeInch' =>'14',
                 'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeDetID' => 'STDRDSZDET029',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE001',
                'strStanSizeDetailName' =>'Chest',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'15',
                 'dblStanSizeCm' => '25',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),


            array(
                'strStandardSizeDetID' => 'STDRDSZDET030',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE002',
                'strStanSizeDetailName' =>'Chest',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'16',
                 'dblStanSizeCm' => '24',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            )

        );    
        DB::table('tblStandardSizeDetail')->insert($tblStandardSizeDetail);
    }
}
