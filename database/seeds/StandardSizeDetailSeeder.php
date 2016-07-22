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
                'dblStanSizeInch' =>'27',
                'dblStanSizeCm' => '36',
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
                'dblStanSizeInch' =>'27',
                'dblStanSizeCm' => '36',
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
                'dblStanSizeInch' =>'29',
                'dblStanSizeCm' => '38',
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
                'dblStanSizeInch' =>'29',
                'dblStanSizeCm' => '38',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            ),

             array(
                'strStandardSizeDetID' => 'STDRDSZDET005',
                'strStanSizeSegmentFK' => 'SEGM004', 
                'strStanSizeMeasCatFK' =>'MEASCAT001',
                'strStanSizeCategoryFK' =>'STDRSZE004',
                'strStanSizeDetailName' =>'Collar',
                'strStanSizeFitType' =>'Loose Fit',
                'dblStanSizeInch' =>'35',
                'dblStanSizeCm' => '44',
                'txtStanSizeDesc' => '',
                'boolIsActive' => '1'
            )


        );    
    }
}
