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
                'type'=> 'employee',
                'email' =>'honeymae@ganda.com',
                'password' => bcrypt('admin01')
            ),

            array(
                'id' => '002',
                'name' => 'Morriel Aquino',
                'type'=> 'employee',
                'email' =>'morrielaquino@yahoo.com',
                'password' =>bcrypt('admin02')
            ),

            array(
                'id' => '003',
                'name' => 'Cassandra Bennete',
                'type'=> 'customer',
                'email' =>'cassdee@yahoo.com',
                'password' =>bcrypt('cust01')
            )

        );

        DB::table('users')->insert($tblUsers);
    }
}
