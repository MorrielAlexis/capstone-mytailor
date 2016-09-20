<?php

use Illuminate\Database\Seeder;

class ChargeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblChargeCategory = array (
            array(
                'strChargeCatID' => 'CHA001',
                'strChargeCatName' => 'Courier Fee',
                'txtChargeDesc' => 'Additional fee for delivery outside Metro Manila.',
                'strChargeCatInactiveReason' =>'',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblChargeCategory')->insert($tblChargeCategory);
    }
}
