<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       // DB::table('tblButton')->delete();

        $tblButton = array (
            array(
                'intButtonID' => '001',
                'strButtonBrand' => 'Double Header',
                'strButtonSize' => 'Small',
                'strButtonColor' => 'Gray',
                'strButtonDesc' => 'Two wholes with extra lining',
                'strButtonImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'intButtonID' => '002',
                'strButtonBrand' => 'Cyclic Button',
                'strButtonSize' => 'Medium',
                'strButtonColor' => 'White',
                'strButtonDesc' => '2 holes wholes with extra circular lining',
                'strButtonImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblButton')->insert($tblButton);
    }
}