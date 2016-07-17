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
      //  DB::table('tblGarmentCategory')->delete();

        $tblGarmentCategory = array (
            array(
                'strGarmentCategoryID' => 'GARM001',
                'strGarmentCategoryName' => 'Uniforms', 
                'textGarmentCategoryDesc' =>'Custom made uniforms for male and female.',
                'boolIsActive' => '1'
            ),

            array(
                'strGarmentCategoryID' => 'GARM002',
                'strGarmentCategoryName' => 'Suits', 
                'textGarmentCategoryDesc' =>'Formal wear essential for men.',
                'boolIsActive' => '1'
            ),

            array(
                'strGarmentCategoryID' => 'GARM003',
                'strGarmentCategoryName' => 'Men Shirt', 
                'textGarmentCategoryDesc' =>'Combination of casual and formal shirts.',
                'boolIsActive' => '1'
            ),

            array(
                'strGarmentCategoryID' => 'GARM004',
                'strGarmentCategoryName' => 'Pants', 
                'textGarmentCategoryDesc' =>'Customize and perfect fit pants.',
                'boolIsActive' => '1'
            ),

            array(
                'strGarmentCategoryID' => 'GARM005',
                'strGarmentCategoryName' => 'Women Shirt', 
                'textGarmentCategoryDesc' =>'Combination of casual and formal shirts for women.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblGarmentCategory')->insert($tblGarmentCategory);
    }
}