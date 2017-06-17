<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {

        DB::table('users')->delete();

        $users = array(
            array(
                'first_name' => 'Admin',
                'last_name' => 'de Admin',
                'email' => 'admin@admin.com',
                'username' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('admin'),
                'address' => 'Adminstraat 1337'
            ),
            array(
                'first_name' => 'Jan',
                'last_name' => 'pieter',
                'email' => 'jan@gmail.com',
                'username' => 'Jan',
                'role' => '',
                'password' => Hash::make('password'),
                'address' => 'onderwijslaan 12'
            )
        );

        DB::table('users')->insert($users);
    }
}

