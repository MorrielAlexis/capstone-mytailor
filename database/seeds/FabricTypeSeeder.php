<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FabricTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblFabricType')->delete();

        $tblFabricType = array (
            array(
                'strFabricTypeID' => 'FABTYPE001',
                'strFabricTypeName' => 'Linen',
                'txtFabricTypeDesc' =>'Use for making lapels in tuxedo.',
                'boolIsActive' => '1'
            ),

            array(
                'strFabricTypeID' => 'FABTYPE002',
                'strFabricTypeName' => 'Cotton',
                'txtFabricTypeDesc' =>'Use in almost all classes of shirt.',
                'boolIsActive' => '1'
            ),


             array(
                'strFabricTypeID' => 'FABTYPE003',
                'strFabricTypeName' => 'Silk',
                'txtFabricTypeDesc' =>'Use in almost all classes of shirt.',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblFabricType')->insert($tblFabricType);
    }
}