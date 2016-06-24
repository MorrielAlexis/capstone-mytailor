<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tblUsers = array (
            array(
                'id' => '001',
                'name' => 'Honey Mae Buenavides',
                'email' =>'honeymae@ganda.com',
                'password' => bcrypt('admin01')
            ),

            array(
                'id' => '002',
                'name' => 'Morriel Aquino',
                'email' =>'morrielaquino@yahoo.com',
                'password' =>bcrypt('admin02')
            )

        );

        DB::table('users')->insert($tblUsers);
    }
}
