<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Category = new \App\Category([
            'id' => 1,
            'name' => 'CS3330'
           ]);

        $Category->save();

        $Category = new \App\Category([
            'id' => 2,
            'name' => 'CS3340'
           ]);

        $Category->save();
    }
}
