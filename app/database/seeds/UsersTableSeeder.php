<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $users = array(
                    array(
                        'username' => 'admin',
                        'email' => 'admin@me.com',
                        'password' => Hash::make('admin'),
                        'updated_at' => DB::raw('NOW()'),
                        'created_at' => DB::raw('NOW()'),
                    ),
                    array(
                        'username' => 'user',
                        'email' => 'user@me.com',
                        'password' => Hash::make('user'),
                        'updated_at' => DB::raw('NOW()'),
                        'created_at' => DB::raw('NOW()'),
                    ),
                );

        // DB::table('users')->insert($users);
    }
}