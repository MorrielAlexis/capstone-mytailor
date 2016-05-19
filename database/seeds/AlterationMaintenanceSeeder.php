<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AlterationMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblFabricType')->delete();

        $tblAlterationMaintenance = array (
            array(
                'strAlterationID' => 'ALTE0001',
                'strAlterationName' => 'Baston',
                'txtAlterationDesc' =>'Use for modifying pants cuff size of pants.',
                'strAlterationPrice' => 'Php100.00',
                'boolIsActive' => '1'
            ),

            array(
                'strAlterationID' => 'ALTE0002',
                'strAlterationName' => 'Hem',
                'txtAlterationDesc' =>'Use in almost all classes of shirt for resizing.',
                'strAlterationPrice' => 'Php200.00',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblAlterationMaintenance')->insert($tblAlterationMaintenance);
    }
}