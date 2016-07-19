<?php

use Illuminate\Database\Seeder;

class BodyPartCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblBodyPartCategory = array (
            array(
                'strBodyPartCategoryID' => 'BDYCAT001',
                'strBodyPartCatName' => 'Shoulders', 
                'textBodyPartCatDesc' =>'Measurement from end to end of the shoulder for the width of the shirt.',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyPartCategoryID' => 'BDYCAT002',
                'strBodyPartCatName' => 'Back', 
                'textBodyPartCatDesc' =>'Measurement from end to end of the back for the length of the shirt.',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyPartCategoryID' => 'BDYCAT003',
                'strBodyPartCatName' => 'Stomach', 
                'textBodyPartCatDesc' =>'Can be large, hefty, flat, etc.',
                'boolIsActive' => '1'
            ),

            array(
                'strBodyPartCategoryID' => 'BDYCAT004',
                'strBodyPartCatName' => 'Body Built', 
                'textBodyPartCatDesc' =>'Can be athletic, regular, hefty.',
                'boolIsActive' => '1'
            )


         );

        DB::table('tblBodyPartCategory')->insert($tblBodyPartCategory);
    }
}
