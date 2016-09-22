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
    					'strPackageSeg3FK' =>  'SEGM008',
              // 'strPackageSeg4FK' =>  'SEGM011',
              // 'strPackageSeg5FK' =>  'SEGM011',
              'dblPackagePrice' => '500.00',
              'intPackageMinDays' => '30',
    					'strPackageImage' =>  'imgPackages/blouse-pants-blazer.png',
    					'strPackageDesc' =>  'Pair of blouse, slack and blazer for female employees. ',
    					'boolIsActive'  =>  '1'      
        			),

              array(
              'strPackageID' => 'PACK0002',
              'strPackageName' =>  'Male Pair A',
              'strPackageSex' =>  'M',
              'strPackageSeg1FK' =>  'SEGM004',
              'strPackageSeg2FK' =>  'SEGM006',
              'strPackageSeg3FK' =>  'SEGM007',
              'dblPackagePrice' => '350.00',
              'intPackageMinDays' => '30',
              'strPackageImage' =>  'imgPackages/whitepants-polo-shirt-male.png',
              'strPackageDesc' =>  'Pair of polo,long sleeve and pants for male employees.',
              'boolIsActive'  =>  '1'     
          )

     //    			array(
     //    			'strPackageID' => 'PACK0002',
     //    			'strPackageName' =>  'Female Pair B',
     //          'strPackageSex' =>  'F',
     //    			'strPackageSeg1FK' =>  'SEGM001',
				 //    	'strPackageSeg2FK' =>  'SEGM005',
     //  		  	'strPackageSeg3FK' =>  'SEGM009',
     //          // 'strPackageSeg4FK' =>  'SEGM002',
     //          // 'strPackageSeg5FK' =>  'SEGM001',
     //          'dblPackagePrice' => '3500.00',
     //          'intPackageMinDays' => '60',
					//     'strPackageImage' =>  'imgPackages/blouse-skirt-blazer-female.jpg',
					//     'strPackageDesc' =>  'Pair of skirt and blouse plus a blazer.',
					//     'boolIsActive'  =>  '1'     
					// )


        );

         DB::table('tblPackages')->insert($tblPackages);
   
    }
}
