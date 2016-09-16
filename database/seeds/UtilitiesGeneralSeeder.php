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
                'strShopName' => 'Keme Management System',
                'strShopImage' =>'img/20160706064251-167357.jpg',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblUtilitiesGeneral')->insert($tblUtilitiesGeneral);
   }
}
