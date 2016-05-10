<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
      //  DB::table('tblEmployee')->delete();

        $tblEmployee = array (
            array(
                'strEmployeeID' => 'EMPL001',
                'strEmpFName' => 'Earvin',
                'strEmpMName' => 'Aquino',
                'strEmpLName' => 'Tolentino',
                'dtEmpBday' =>'1996-07-02',
                'strSex' => 'M',
                'strEmpHouseNo' => '44',
                'strEmpStreet' => 'Rizal St.',
                'strEmpBarangay' => 'Bagbag',
                'strEmpCity' => 'Bauang',
                'strEmpProvince' => 'La Union',
                'strEmpZipCode' => '2501',
                'strRole' => 'ROLE001',
                'strCellNo' =>'09162451291',
                'strCellNoAlt' =>'0915543-2875',
                'strPhoneNo' => '02345890',
                'strEmailAdd' => 'earvintol@gmail.com',
                'boolIsActive' => '1'
            ),

            array(
                'strEmployeeID' => 'EMPL002',
                'strEmpFName' => 'Amber',
                'strEmpMName' => 'Aquino',
                'strEmpLName' => 'Lastima',
                'dtEmpBday' =>'2000-08-04',
                'strSex' => 'F',
                'strEmpHouseNo' => '41',
                'strEmpStreet' => 'Bonficatio St.',
                'strEmpBarangay' => 'Sangandaan',
                'strEmpCity' => 'Caloocan School',
                'strEmpProvince' => 'La Union',
                'strEmpZipCode' => '2501',
                'strRole' => 'ROLE002',
                'strCellNo' =>'0919786-4523',
                'strCellNoAlt' =>'0923098567',
                'strPhoneNo' => '02341276',
                'strEmailAdd' => 'amberaq@gmail.com',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblEmployee')->insert($tblEmployee);
    }
}