<?php

use Illuminate\Database\Seeder;

class NonShopAlterationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblNonShopAlteration= array (
            array(
                'strNonShopAlterID' => 'ALTN001',
                'strCustIndFK' => 'CUSTP001',
                'strCustCompFK' => '',
                'dblOrderTotalPrice' => 200, 
                'dtAlteration' =>'2016-09-04',
                
                )

        );

        DB::table('tblNonShopAlteration')->insert($tblNonShopAlteration);
    }
    
}
