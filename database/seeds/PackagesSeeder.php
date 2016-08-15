<?php

use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblPackages = array(
        	array( 

        			'strPackageID' => 'PACK0001',
        			'strPackageName' =>  'Female Pair A',
              'strPackageSex' =>  'F',
  					  'strPackageSeg1FK' =>  'SEGM003',
    					'strPackageSeg2FK' =>  'SEGM005',
    					'strPackageSeg3FK' =>  'SEGM015',
              'dblPackagePrice' => '2500.00',
              'intPackageMinDays' => '60',
    					'strPackageImage' =>  'imgPackages/blouse-pants-blazer.png',
    					'strPackageDesc' =>  'Pair of blouse, slack and blazer for female employees. ',
    					'boolIsActive'  =>  '1'      
        			),

        			array(
        			'strPackageID' => 'PACK0002',
        			'strPackageName' =>  'Female Pair B',
              'strPackageSex' =>  'F',
        			'strPackageSeg1FK' =>  'SEGM003',
				    	'strPackageSeg2FK' =>  'SEGM005',
      		  	'strPackageSeg3FK' =>  'SEGM007',
              'dblPackagePrice' => '3500.00',
              'intPackageMinDays' => '60',
					    'strPackageImage' =>  'imgPackages/blouse-pants-dress-2.png',
					    'strPackageDesc' =>  'Pair of slacks and blouse plus a dress.',
					    'boolIsActive'  =>  '1'     
					)

          // array(
          //     'strPackageID' => 'PACK0003',
          //     'strPackageName' =>  'Male Pair A',
          //     'strPackageSex' =>  'M',
          //     'strPackageSeg1FK' =>  'SEGM004',
          //     'strPackageSeg2FK' =>  'SEGM006',
          //     'dblPackagePrice' => '2500.00',
          //     'intPackageMinDays' => '60',
          //     'strPackageImage' =>  'imgPackages/whitepants-polo-shirt-male.png',
          //     'strPackageDesc' =>  'Pair of polo and pants for male employees.',
          //     'boolIsActive'  =>  '1'     
          // )

        );

         DB::table('tblPackages')->insert($tblPackages);
   
    }
}
