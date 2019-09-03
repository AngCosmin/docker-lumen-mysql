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
        $this->call([
            UsersTableSeeder::class,
            RestaurantsTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            TablesTableSeeder::class,
        ]);
    }
}
