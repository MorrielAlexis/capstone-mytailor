<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblCustomer = array (
        	array(
        		'strCustomerID' => 'CUST001',
        		'strCustomer_IndFK' => 'CUSTP001',
        		'strCustomer_CompanyFK' => '',
        		'strCustomerAccountIDFK' => '',
        		'boolIsActive' => '1',
                'strCustInactiveReason' => '' 
        		),

            array(
                'strCustomerID' => 'CUST002',
                'strCustomer_IndFK' => '',
                'strCustomer_CompanyFK' => 'CUSTC001',
                'strCustomerAccountIDFK' => '',
                'boolIsActive' => '1', 
                'strCustInactiveReason' => ''
                ),

            array(
                'strCustomerID' => 'CUST003',
                'strCustomer_IndFK' => 'CUSTP002',
                'strCustomer_CompanyFK' => '',
                'strCustomerAccountIDFK' => '',
                'boolIsActive' => '1', 
                'strCustInactiveReason' => ''
                ),

        	array(
        		'strCustomerID' => 'CUST004',
        		'strCustomer_IndFK' => '',
        		'strCustomer_CompanyFK' => 'CUSTC002',
        		'strCustomerAccountIDFK' => '',
        		'boolIsActive' => '1', 
                'strCustInactiveReason' => ''
        		)
        	);

        DB::table('tblCustomer')->insert($tblCustomer);
    }
}
