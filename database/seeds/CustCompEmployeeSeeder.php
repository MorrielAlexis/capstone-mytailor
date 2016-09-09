<?php

use Illuminate\Database\Seeder;

class CustCompEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tblCustCompEmployee = array (
        		array(
        			'strCustCompEmployeeID' => 'CUSTCE001',
        			'strCustCompanyFK' => 'CUSTC001',
        			'strCustCompEmpFullName' => 'Honey May Buenavides',
        			'strCustCompEmpSex' => 'Female',
        			'boolIsActive' => '1',
        			),

        		array(
        			'strCustCompEmployeeID' => 'CUSTCE002',
        			'strCustCompanyFK' => 'CUSTC001',
        			'strCustCompEmpFullName' => 'Conrado Bataller Jr.',
        			'strCustCompEmpSex' => 'Male',
        			'boolIsActive' => '1',
        			),

        		array(
        			'strCustCompEmployeeID' => 'CUSTCE003',
        			'strCustCompanyFK' => 'CUSTC002',
        			'strCustCompEmpFullName' => 'Ted Mosby',
        			'strCustCompEmpSex' => 'Male',
        			'boolIsActive' => '1',
        			),

        		array(
        			'strCustCompEmployeeID' => 'CUSTCE004',
        			'strCustCompanyFK' => 'CUSTC002',
        			'strCustCompEmpFullName' => 'Robin Scherbatsky',
        			'strCustCompEmpSex' => 'Female',
        			'boolIsActive' => '1',
        			)
        	);

		 DB::table('tblCustCompEmployee')->insert($tblCustCompEmployee);
    }
}
