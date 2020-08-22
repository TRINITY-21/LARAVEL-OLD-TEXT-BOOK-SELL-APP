<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sayyid',
            'email' => 'Rasools2@uenr.edu.gh',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sarmad',
            'email' => 'Rasools@uenr.edu.gh',
            'password' => bcrypt('secret'),
        ]);
    }
}
