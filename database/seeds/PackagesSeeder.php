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
        			'strPackageName' =>  'Generic Package A (Male)',
  					'strPackageSeg1FK' =>  'SEGM001',
					'strPackageSeg2FK' =>  'SEGM002',
					'strPackageSeg3FK' =>  'SEGM003',
					'strPackageSeg4FK' =>  'SEGM002',
					'strPackageSeg5FK' =>  'SEGM001',
                    'intPackageMinDays' => '60',
					'strPackageImage' =>  '',
					'strPackageDesc' =>  'Package for male fre',
					'boolIsActive'  =>  '1'      
        			),

        			array(
        			'strPackageID' => 'PACK0002',
        			'strPackageName' =>  'Generic Package B (Female)',
  					'strPackageSeg1FK' =>  'SEGM002',
					'strPackageSeg2FK' =>  'SEGM002',
					'strPackageSeg3FK' =>  'SEGM004',
					'strPackageSeg4FK' =>  'SEGM004',
					'strPackageSeg5FK' =>  'SEGM006',
                    'intPackageMinDays' => '60',
					'strPackageImage' =>  '',
					'strPackageDesc' =>  'Package for female fre',
					'boolIsActive'  =>  '1'     
					)

        );

         DB::table('tblPackages')->insert($tblPackages);
   
    }
}
