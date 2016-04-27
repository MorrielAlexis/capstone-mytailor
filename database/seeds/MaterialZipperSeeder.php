<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialZipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
      //  DB::table('tblZipper')->delete();

        $tblZipper = array (
            array(
                'intZipperID' => '001',
                'strZipperBrand' => 'Zigzag',
                'strZipperSize' => 'Small',
                'strZipperColor' => 'Gray',
                'txtZipperDesc' => 'For Pants',
                'strZipperImage' => '',
                'boolIsActive' => '1'
            ),

            array(
                'intZipperID' => '002',
                'strZipperBrand' => 'Straight',
                'strZipperSize' => 'Medium',
                'strZipperColor' => 'Blue',
                'txtZipperDesc' => 'Zipper for pockets',
                'strZipperImage' => '',
                'boolIsActive' => '1'
            )

        );

        DB::table('tblZipper')->insert($tblZipper);
    }
}