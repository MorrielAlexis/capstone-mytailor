<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialHookEyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       // DB::table('tblHookEye')->delete();

        $tblHookEye = array (
            array(
                'intHookID' => '001',
                'strHookBrand' => 'Skirt Hook',
                'strHookSize' => 'Small',
                'strHookColor' => 'Black',
                'strHookImage' => 'imgMaterialHooks/skirthookandeye-1.jpg',
                'textHookDesc' => 'Use for skirt and dress',
                'boolIsActive' => '1'
            ),

            array(
                'intHookID' => '002',
                'strHookBrand' => 'Pants Hook',
                'strHookSize' => 'Medium',
                'strHookColor' => 'Silver',
                'strHookImage' => 'imgMaterialHooks/skirthookandeye-5.jpg',
                'textHookDesc' => 'Use for pants',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblHookEye')->insert($tblHookEye);
    }
}