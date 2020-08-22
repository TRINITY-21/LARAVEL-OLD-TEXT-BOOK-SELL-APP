<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BookTableSeeder::class);
        //  $this->call(UsersTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
        factory('App\User', 3)->create();
        // factory('App\Book')->create();
    }
}
