<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       // DB::table('tblThread')->delete();

        $tblThread = array (
            array(
                'intThreadID' => '001',
                'strThreadBrand' => 'Coats Metallic',
                'strThreadColor' =>'Silver',
                'strThreadDesc' => 'Used for theatrical costumes and other events.',
                'strThreadImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'intThreadID' => '002',
                'strThreadBrand' => 'Rayon',
                'strThreadColor' =>'Red',
                'strThreadDesc' => 'For normal clothes',
                'strThreadImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblThread')->insert($tblThread);
    }
}