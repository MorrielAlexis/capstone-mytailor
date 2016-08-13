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
                'name' => 'Morriel Aquino',
                'type'=> 'employee',
                'email' =>'morrielaquino@yahoo.com',
                'password' =>bcrypt('adminpass'),
                'confirmation_code' => null,
                'confirmed' => 1,
                'user_image' => 'imgUsers/Morriel IBITS Background.jpg'
            ),

            array(
                'id' => 'USER002',
                'name' => 'Honey May Buenavides',
                'type'=> 'customer',
                'email' =>'haniganda@gmail.com',
                'password' =>bcrypt('custpass01'),
                'confirmation_code' => null,
                'confirmed' => 1,
                'user_image' => 'imgUsers/honeybabe.jpg'
            ),

            array(
                'id' => 'USER003',
                'name' => 'Pfizer Phils',
                'type'=> 'customer',
                'email' =>'pfizer@gmail.com',
                'password' =>bcrypt('custpass02'),
                'confirmation_code' => null,
                'confirmed' => 1,
                'user_image' => null
            )

        );

        DB::table('users')->insert($tblUsers);
    }
}
