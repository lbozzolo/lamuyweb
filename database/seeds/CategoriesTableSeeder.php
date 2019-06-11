<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('sistema.categories');

        foreach ($categories as $key => $value) {
            DB::table('categories')->insert([
                'name' => $value,
                'slug' => str_slug($value, '-'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }

    }
}
