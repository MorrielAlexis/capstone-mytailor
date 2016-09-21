<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CustCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //DB::table('tblCustCompany')->delete();

        $tblCustCompany = array (
            array(
                'strCompanyID' => 'CUSTC001',
                'strCompanyName' => 'Pfizer Phils',
                'strCompanyBuildingNo' => '771',
                'strCompanyStreet' => 'Aseana',
                'strCompanyBarangay' => 'San Miguel',
                'strCompanyCity' => 'Pasig',
                'strCompanyProvince' => 'NCR',
                'strCompanyZipCode' => '099',
                'strContactPerson' => 'Lala Roque',
                'strCompanyEmailAddress' => 'melodyreyes@pfizer.com',
                'strCompanyTelNumber' => '2227777',
                'strCompanyCPNumber' => '09178901234',
                'strCompanyCPNumberAlt' => '09171234567',
                'strCompanyFaxNumber' => '4440102',
                'strCompanyImg' => '',
                'userId' => null,
                'boolIsActive' => '1'
            ),

            array(
                'strCompanyID' => 'CUSTC002',
                'strCompanyName' => 'Nestle PH',
                'strCompanyBuildingNo' => '056',
                'strCompanyStreet' => 'Roxas',
                'strCompanyBarangay' => 'Regexing',
                'strCompanyCity' => 'Majayjay',
                'strCompanyProvince' => 'Laguna',
                'strCompanyZipCode' => '1028',
                'strContactPerson' => 'Zobel Ayala',
                'strCompanyEmailAddress' => 'welness@nestle.com',
                'strCompanyTelNumber' => '0345678',
                'strCompanyCPNumber' => '09222349876',
                'strCompanyCPNumberAlt' => '0922345-6987',
                'strCompanyFaxNumber' => '0031234',
                'strCompanyImg' => '',
                'userId' => null,
                'boolIsActive' => '1'
            )

        );

        DB::table('tblCustCompany')->insert($tblCustCompany);
    }
}
