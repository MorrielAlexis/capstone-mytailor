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
  					'strPackage-Seg1FK' =>  'SEGM001',
					'strPackage-Seg2FK' =>  'SEGM002',
					'strPackage-Seg3FK' =>  'SEGM003',
					'strPackage-Seg4FK' =>  'SEGM002',
					'strPackage-Seg5FK' =>  'SEGM001',
					'strPackageImage' =>  '',
					'strPackageDesc' =>  'Package for male fre',
					'boolIsActive'  =>  '1'      
        			),

        			array(
        			'strPackageID' => 'PACK0002',
        			'strPackageName' =>  'Generic Package B (Female)',
  					'strPackage-Seg1FK' =>  'SEGM002',
					'strPackage-Seg2FK' =>  'SEGM002',
					'strPackage-Seg3FK' =>  'SEGM004',
					'strPackage-Seg4FK' =>  'SEGM004',
					'strPackage-Seg5FK' =>  'SEGM006',
					'strPackageImage' =>  '',
					'strPackageDesc' =>  'Package for female fre',
					'boolIsActive'  =>  '1'     
					)

        );

         DB::table('tblPackages')->insert($tblPackages);
   
    }
}
