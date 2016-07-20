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
        			'strPackageName' =>  'Generic FA',
              'strPackageSex' =>  'F',
  					  'strPackageSeg1FK' =>  'SEGM003',
    					'strPackageSeg2FK' =>  'SEGM003',
    					'strPackageSeg3FK' =>  'SEGM003',
    					'strPackageSeg4FK' =>  'SEGM005',
    					'strPackageSeg5FK' =>  'SEGM005',
              'dblPackagePrice' => '2500.00',
              'intPackageMinDays' => '60',
    					'strPackageImage' =>  'imgPackages/Fset 1.1.png',
    					'strPackageDesc' =>  '3 pairs of blouse and ladies slacks. ',
    					'boolIsActive'  =>  '1'      
        			),

        			array(
        			'strPackageID' => 'PACK0002',
        			'strPackageName' =>  'Generic FB',
              'strPackageSex' =>  'F',
        			'strPackageSeg1FK' =>  'SEGM003',
				    	'strPackageSeg2FK' =>  'SEGM003',
      		  	'strPackageSeg3FK' =>  'SEGM005',
      		  	'strPackageSeg4FK' =>  'SEGM005',
      		  	'strPackageSeg5FK' =>  'SEGM007',
              'dblPackagePrice' => '3500.00',
              'intPackageMinDays' => '60',
					    'strPackageImage' =>  'imgPackages/Fset 2.1.png',
					    'strPackageDesc' =>  '2 pairs of slacks and blouse plus a dress.',
					    'boolIsActive'  =>  '1'     
					),

              array(
              'strPackageID' => 'PACK0003',
              'strPackageName' =>  'Generic FC',
              'strPackageSex' =>  'F',
              'strPackageSeg1FK' =>  'SEGM007',
              'strPackageSeg2FK' =>  'SEGM007',
              'strPackageSeg3FK' =>  'SEGM007',
              'strPackageSeg4FK' =>  'SEGM005',
              'strPackageSeg5FK' =>  'SEGM003',
              'dblPackagePrice' => '3500.00',
              'intPackageMinDays' => '60',
              'strPackageImage' =>  'imgPackages/Fset 3.1.png',
              'strPackageDesc' =>  '3 pieces of dress and a ladies slacks and blouse.',
              'boolIsActive'  =>  '1'     
          )

        );

         DB::table('tblPackages')->insert($tblPackages);
   
    }
}
