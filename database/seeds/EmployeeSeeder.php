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
                'strEmpFName' => 'Morriel',
                'strEmpMName' => 'Tolentino',
                'strEmpLName' => 'Aquino',
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
                'strCellNoAlt' =>'09155432875',
                'strPhoneNo' => '02345890',
                'strEmpImg' => 'imgUsers/Morriel IBITS Background.jpg',
                'strEmailAdd' => 'morrielaquino@yahoo.com',
                'userId' => 'USER001',
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
                'strCellNo' =>'09197864523',
                'strCellNoAlt' =>'0923098567',
                'strPhoneNo' => '02341276',
                'strEmpImg' => '',
                'strEmailAdd' => 'amberaq@gmail.com',
                'userId' => null,
                'boolIsActive' => '1'
            )

        );

        DB::table('tblEmployee')->insert($tblEmployee);
    }
}