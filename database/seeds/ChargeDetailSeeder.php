<?php

use Illuminate\Database\Seeder;

class ChargeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblChargeDetail = array (
            array(
                'strChargeDetailID' => 'CHRGDET001',
                'strChargeCatFK' => 'CHA001',
                'strChargeDetSegFK' => null,
                'dblChargeDetPrice' => 12.00,
                'txtChargeDetDesc' => '',
                'strChargeDetInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strChargeDetailID' => 'CHRGDET002',
                'strChargeCatFK' => 'CHA002',
                'strChargeDetSegFK' => 'SEGM004',
                'dblChargeDetPrice' => 250.00,
                'txtChargeDetDesc' => '',
                'strChargeDetInactiveReason' => '',
                'boolIsActive' => '1'
            ),

            array(
                'strChargeDetailID' => 'CHRGDET003',
                'strChargeCatFK' => 'CHA002',
                'strChargeDetSegFK' => 'SEGM006',
                'dblChargeDetPrice' => 150.00,
                'txtChargeDetDesc' => '',
                'strChargeDetInactiveReason' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblChargeDetail')->insert($tblChargeDetail);
    }
}
