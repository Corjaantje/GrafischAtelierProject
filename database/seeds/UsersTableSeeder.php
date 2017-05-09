<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {

        DB::table('users')->delete();

        $users = array(
            array(
                'name' => 'Jan',
                'email' => 'jan@gmail.com',
                'username' => 'Jan',
                'role' => '',
                'password' => Hash::make('password'),
                'address' => 'onderwijslaan 12'
            ),
            array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'username' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('admin'),
                'address' => 'admin'
            )
        );

        DB::table('users')->insert($users);
    }
}

