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
                'intAlterationMinDays' => 3, 
                'txtAlterationDesc' =>'Use for modifying pants cuff size of pants.',
                'dblAlterationPrice' => 100.00,
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0002',
                'strAlterationName' => 'Shorten Sleeves',
                'strAlterationSegmentFK' => 'SEGM004',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 100.00,
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0003',
                'strAlterationName' => 'Slim Sleeves',
                'strAlterationSegmentFK' => 'SEGM004',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 150.00,
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0004',
                'strAlterationName' => 'Adjust Shoulder',
                'strAlterationSegmentFK' => 'SEGM004',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 150.00,
                'boolIsActive' => '1'
            ),

              array(
                'strAlterationID' => 'ALTE0005',
                'strAlterationName' => 'Slim',
                'strAlterationSegmentFK' => 'SEGM004',
                'intAlterationMinDays' => 5, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 120.00,
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0006',
                'strAlterationName' => 'Slim Leg',
                'strAlterationSegmentFK' => 'SEGM006',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 100.00,
                'boolIsActive' => '1'
            ),

             array(
                'strAlterationID' => 'ALTE0007',
                'strAlterationName' => 'Adjust Waist',
                'strAlterationSegmentFK' => 'SEGM006',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 120.00,
                'boolIsActive' => '1'
            ),

              array(
                'strAlterationID' => 'ALTE0008',
                'strAlterationName' => 'Baston Cutting',
                'strAlterationSegmentFK' => 'SEGM006',
                'intAlterationMinDays' => 2, 
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'dblAlterationPrice' => 70.00,
                'boolIsActive' => '1'
            )


        );

        DB::table('tblAlteration')->insert($tblAlteration);
    }
}