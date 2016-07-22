<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class JobOrderProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $tblJobOrderProgress = array (
            array(
                'strJobOrderProgressID' => 'JOP001',
                'strJobOrderSpecificFK' => 'JOS001',
                'intProgressAmount' => '3',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP002',
                'strJobOrderSpecificFK' => 'JOS002',
                'intProgressAmount' => '4',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP003',
                'strJobOrderSpecificFK' => 'JOS003',
                'intProgressAmount' => '4',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP004',
                'strJobOrderSpecificFK' => 'JOS004',
                'intProgressAmount' => '4',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP005',
                'strJobOrderSpecificFK' => 'JOS005',
                'intProgressAmount' => '2',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP006',
                'strJobOrderSpecificFK' => 'JOS006',
                'intProgressAmount' => '15',
                'dtProgressDate' => '2016-07-23',
            ),

            array(
                'strJobOrderProgressID' => 'JOP007',
                'strJobOrderSpecificFK' => 'JOS007',
                'intProgressAmount' => '5',
                'dtProgressDate' => '2016-07-23',
            )
          
            
        );

        DB::table('tblJobOrderProgress')->insert($tblJobOrderProgress);
    }
}