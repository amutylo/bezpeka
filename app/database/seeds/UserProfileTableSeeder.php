<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $usersProfile = array(
                    array(
                        'user_id' => 1,
                        'add_info' => 'admin additional information',
                        'updated_at' => DB::raw('NOW()'),
                        'created_at' => DB::raw('NOW()'),
                    ),
                    array(
                        'user_id' => 2,
                        'add_info' => 'simple user additional information',
                        'updated_at' => DB::raw('NOW()'),
                        'created_at' => DB::raw('NOW()'),
                    ),
                );

        DB::table('users_profile')->insert($usersProfile);
    }
}