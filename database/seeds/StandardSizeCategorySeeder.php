<?php

use Illuminate\Database\Seeder;

class StandardSizeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tblStandardSizeCategory = array (
            array(
                'strStandardSizeCategoryID' => 'STDRSZE001',
                'strStandardSizeCategoryName' => 'Extra Small', 
                'txtStandardSizeCategoryDesc' =>'For extra petite body type.',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeCategoryID' => 'STDRSZE002',
                'strStandardSizeCategoryName' => 'Small', 
                'txtStandardSizeCategoryDesc' =>'For petite body type.',
                'boolIsActive' => '1'
            ),


            array(
                'strStandardSizeCategoryID' => 'STDRSZE003',
                'strStandardSizeCategoryName' => 'Medium', 
                'txtStandardSizeCategoryDesc' =>'For regular body type.',
                'boolIsActive' => '1'
            ),

            array(
                'strStandardSizeCategoryID' => 'STDRSZE004',
                'strStandardSizeCategoryName' => 'Large', 
                'txtStandardSizeCategoryDesc' =>'For slight hefty body type.',
                'boolIsActive' => '1'
            )

          
        );

        DB::table('tblStandardSizeCategory')->insert($tblStandardSizeCategory);
    }
}
