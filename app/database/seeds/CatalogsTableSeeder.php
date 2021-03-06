<?php

class CatalogsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('catalogs')->truncate();

		$catalogs = array(
                        array(
                            'catalog' => 'аудио',
                            'c_description' => 'аудио каталог',
                            'active' => 1,
                            'updated_at' => DB::raw('NOW()'),
                            'created_at' => DB::raw('NOW()')
                        ),

                        array(
                            'catalog' => 'video',
                            'c_description' => 'видео каталог',
                            'active' => 1,
                            'updated_at' => DB::raw('NOW()'),
                            'created_at' => DB::raw('NOW()')
                        )
		);

		// Uncomment the below to run the seeder
		 DB::table('catalogs')->insert($catalogs);
	}

}
