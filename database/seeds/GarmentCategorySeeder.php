<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GarmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('tblGarmentCategory')->delete();

        $tblGarmentCategory = array (
            array(
                'strGarmentCategoryID' => 'GARM001',
                'strGarmentCategoryName' => 'Uniforms', 
                'textGarmentCategoryDesc' =>'Custom made uniforms for male and female.',
                'boolIsActive' => '1'
            ),

            array(
                'strGarmentCategoryID' => 'GARM002',
                'strGarmentCategoryName' => 'Tuxedo', 
                'textGarmentCategoryDesc' =>'Formal essential for men.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblGarmentCategory')->insert($tblGarmentCategory);
    }
}