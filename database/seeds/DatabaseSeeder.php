<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $this->call(UserRoleTableSeeder::class);
         $this->call(LanguageTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
		 $this->call(SettingTableSeeder::class);*/
         //$this->call(ProductStatusTableSeeder::class);

         //Seeder temporary
         factory(\App\ProductStatus::class)->create([
            'id' => 0,
            'status' => 'Not Available'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 1,
            'status' => 'Active'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 2,
            'status' => 'Waiting'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 3,
            'status' => 'To check'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 4,
            'status' => 'To correct'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 5,
            'status' => 'Verified & Active'
        ]);
        factory(\App\ProductStatus::class)->create([
            'id' => 6,
            'status' => 'Discontinued'
        ]);
    }
}
