<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {

        DB::table('users')->delete();

        $users = array(
            array(
                'first_name' => 'Jan',
                'last_name' => 'pieter',
                'email' => 'jan@gmail.com',
                'username' => 'jan',
                'role' => '',
                'password' => Hash::make('password'),
                'address' => 'onderwijslaan 12'
            ),
            array(
                'first_name' => 'admin',
                'last_name' => 'de beste',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('admin'),
                'address' => 'admin'
            )
        );

        DB::table('users')->insert($users);
    }
}

