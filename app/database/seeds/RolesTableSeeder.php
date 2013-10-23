<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{

		$roles = array(
                        array(
                            'role' => 'admin',
                            'description' => 'site administrator',
                            'updated_at' => DB::raw('NOW()'),
                            'created_at' => DB::raw('NOW()')
                        ),

                        array(
                            'role' => 'user',
                            'description' => 'simple site user',
                            'updated_at' => DB::raw('NOW()'),
                            'created_at' => DB::raw('NOW()')
                        )
                    );

        DB::table('roles')->insert($roles);
	}

}
