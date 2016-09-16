<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class JobOrderSpecificSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $tblJOSpecific = array (
            array(
                'strJOSpecificID' => 'JOS001',
                'strJobOrderFK' => 'JO001',    
                'strJOSegmentFK' => 'SEGM001',
                'strJOFabricFK' => 'FAB001',
                'intQuantity' => '10',
                'dblUnitPrice' => '450.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS002',
                'strJobOrderFK' => 'JO001',    
                'strJOSegmentFK' => 'SEGM002',
                'strJOFabricFK' => 'FAB001',
                'intQuantity' => '5',
                'dblUnitPrice' => '800.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS003',
                'strJobOrderFK' => 'JO003',    
                'strJOSegmentFK' => 'SEGM004',
                'strJOFabricFK' => 'FAB001',
                'intQuantity' => '5',
                'dblUnitPrice' => '550.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS004',
                'strJobOrderFK' => 'JO004',    
                'strJOSegmentFK' => 'SEGM005',
                'strJOFabricFK' => 'FAB002',
                'intQuantity' => '7',
                'dblUnitPrice' => '750.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS005',
                'strJobOrderFK' => 'JO002',    
                'strJOSegmentFK' => 'SEGM003',
                'strJOFabricFK' => 'FAB002',
                'intQuantity' => '5',
                'dblUnitPrice' => '600.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS006',
                'strJobOrderFK' => 'JO005',    
                'strJOSegmentFK' => 'SEGM003',
                'strJOFabricFK' => 'FAB002',
                'intQuantity' => '25',
                'dblUnitPrice' => '600.00',
                'intEstimatedDaystoFinish' => '15',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            ),

            array(
                'strJOSpecificID' => 'JOS007',
                'strJobOrderFK' => 'JO003',    
                'strJOSegmentFK' => 'SEGM004',
                'strJOFabricFK' => 'FAB002',
                'intQuantity' => '15',
                'dblUnitPrice' => '600.00',
                'intEstimatedDaystoFinish' => '10',
                'strEmployeeNameFK' => 'EMPL001',
                'dtDateModified' => '2016-07-23',
                'boolIsActive' => '1'
            )
            
        );

        DB::table('tblJOSpecific')->insert($tblJOSpecific);
    }
}