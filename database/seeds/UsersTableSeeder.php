<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {

        DB::table('users')->delete();

        $users = array(
            array(
                'name' => 'Jan',
                'email' => 'jan@gmail.com',
                'username' => 'jan',
                'password' => Hash::make('password'),
                'address' => 'onderwijslaan 12'
            )
        );

        DB::table('users')->insert($users);
    }
}

