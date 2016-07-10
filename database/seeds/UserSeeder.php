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
                'id' => 'USER001',
                'first_name' => 'Honey Mae',
                'last_name' => 'Buenavides',
                'type'=> 'employee',
                'email' =>'honeymae@ganda.com',
                'password' => bcrypt('admin01'),
                'user_image' => ''
            ),

            array(
                'id' => 'USER002',
                'first_name' => 'Morriel',
                'last_name' => 'Aquino',
                'type'=> 'employee',
                'email' =>'morrielaquino@yahoo.com',
                'password' =>bcrypt('admin02'),
                'user_image' => ''
            ),

            array(
                'id' => 'USER003',
                'first_name' => 'Cassandra Bennete',
                'last_name' => 'De Asis',
                'type'=> 'customer',
                'email' =>'cassdee@yahoo.com',
                'password' =>bcrypt('cust01'),
                'user_image' => ''
            )

        );

        DB::table('users')->insert($tblUsers);
    }
}
