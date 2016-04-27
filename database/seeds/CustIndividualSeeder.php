<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CustIndividualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       // DB::table('tblCustIndividual')->delete();

        $tblCustIndividual = array (
            array(
                'strIndivID' => 'CUSTP001',
                'strIndivFName' => 'Melody',
                'strIndivLName' => 'Legaspi',
                'strIndivMName' => 'Reyes',
                'strIndivGender' => 'Female',
                'strIndivHouseNo' => '44',
                'strIndivStreet' => 'Ipil St.',
                'strIndivBarangay' => 'St. Anthony',
                'strIndivCity' => 'Cainta',
                'strIndivProvince' => 'Rizal',
                'strIndivZipCode' => '1007',
                'strIndivLandlineNumber' => '0467892',
                'strIndivCPNumber' => '(0915)-678-9678',
                'strIndivCPNumberAlt' => '(0912)-234-5678',
                'strIndivEmailAddress' => 'melodyreyes@gmail.com',
                'boolIsActive' => '1'
            ),

            array(
                'strIndivID' => 'CUSTP002',
                'strIndivFName' => 'Rachel',
                'strIndivLName' => 'Nayre',
                'strIndivMName' => 'Atian',
                'strIndivGender' => 'Female',
                'strIndivHouseNo' => '41',
                'strIndivStreet' => 'Narra St.',
                'strIndivBarangay' => 'Kwek-kwek',
                'strIndivCity' => 'Angono',
                'strIndivProvince' => 'Rizal',
                'strIndivZipCode' => '1003',
                'strIndivLandlineNumber' => '0723456',
                'strIndivCPNumber' => '(0919)-876-1290',
                'strIndivCPNumberAlt' => '(0912)-123-6789',
                'strIndivEmailAddress' => 'reychnayre@yahoo.com',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblCustIndividual')->insert($tblCustIndividual);
    }
}