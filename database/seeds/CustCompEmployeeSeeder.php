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
        			'strCustCompEmpFirstName' => 'Honey May',
                    'strCustCompEmpLastName' => 'Buenavides',
                    'strCustCompEmpMiddleName' => '',
        			'strCustCompEmpSex' => 'F',
        			'boolIsActive' => '1',
        			),

        		array(
        			'strCustCompEmployeeID' => 'CUSTCE002',
        			'strCustCompanyFK' => 'CUSTC001',
                    'strCustCompEmpFirstName' => 'Conrado',
                    'strCustCompEmpLastName' => 'Bataller Jr.',
                    'strCustCompEmpMiddleName' => '',
        			'strCustCompEmpSex' => 'M',
        			'boolIsActive' => '1',
        			)
        	);

		 DB::table('tblCustCompEmployee')->insert($tblCustCompEmployee);
    }
}
