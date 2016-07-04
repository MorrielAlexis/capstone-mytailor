<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblPayment = array (
        		array( 
        			'strPaymentID' => 'PID0001',
        			'strCustomerIdFK' => 'CUSTP001',
        			'dtTransacDate' => '2016-07-24',
        			'dblAmtPayable' => '15000',
        			'dblOustandingBal' => '5000',
        			'dtDueDate' => '2016-08-16',
        			'boolIsActive' => '1'
        		),
				array( 
        			'strPaymentID' => 'PID0002',
        			'strCustomerIdFK' => 'CUSTP002',
        			'dtTransacDate' => '2016-08-13',
        			'dblAmtPayable' => '15000',
        			'dblOustandingBal' => '5000',
        			'dtDueDate' => '2016-08-30',
        			'boolIsActive' => '1'
        			)

        	);

        DB::table('tblPayment')->insert($tblPayment);
    }
}
