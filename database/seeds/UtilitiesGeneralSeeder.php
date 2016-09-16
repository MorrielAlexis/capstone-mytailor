<?php

use Illuminate\Database\Seeder;

class UtilitiesGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tblUtilitiesGeneral = array (
            array(
                'intUtilsGenID' => '1',
                'strShopName' => 'Tailoring Management System',
                'strShopImage' =>'img/logo.jpg',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblUtilitiesGeneral')->insert($tblUtilitiesGeneral);
   }
}
