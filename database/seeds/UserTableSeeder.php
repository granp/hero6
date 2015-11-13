<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Geran Peredo',
            'role_id' => '2',
            'username' => 'granp',
            'email'    => 'granperedo@gmail.com',
            'password' => Hash::make('p3r3d0'),]
            );

        DB::table('users')->insert(['name' => 'Root',
            'role_id' => '1',
            'username' => 'root',
            'email'    => 'root@gmail.com',
            'password' => Hash::make('p3r3d0'),]
            );

        DB::table('users')->insert(['name' => 'Ikki Ogayon',
            'role_id' => '3',
            'username' => 'ikki',
            'email'    => 'ikki@gmail.com',
            'password' => Hash::make('p3r3d0'),]
            );

        DB::table('users')->insert(['name' => 'Carina Santos',
            'role_id' => '5',
            'username' => 'caren',
            'email'    => 'caren@gmail.com',
            'password' => Hash::make('p3r3d0'),]
            );
    }
}
