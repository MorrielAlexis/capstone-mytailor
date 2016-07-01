<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AlterationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblFabricType')->delete();

        $tblAlteration= array (
            array(
                'strAlterationID' => 'ALTE0001',
                'strAlterationName' => 'Pants Hem',
                'strAlterationSegmentFK' => 'SEGM001',
                'txtAlterationDesc' =>'Use for modifying pants cuff size of pants.',
                'dblAlterationPrice' => 100.00,
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0002',
                'strAlterationName' => 'Shorten Sleeves',
                'strAlterationSegmentFK' => 'SEGM004',
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 200.00,
                'boolIsActive' => '1'
            )

        );

        DB::table('tblAlteration')->insert($tblAlteration);
    }
}