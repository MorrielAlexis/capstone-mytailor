<?php

use Illuminate\Database\Seeder;

class UtilitiesTaxSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblVat = array (
            array(
                'intVatID' => 'TAX001',
                'strTaxName' => 'Value Added Tax',
                'dblTaxPercentage' => 12

            )

        );

        DB::table('tblVat')->insert($tblVat);
    
    }
}
