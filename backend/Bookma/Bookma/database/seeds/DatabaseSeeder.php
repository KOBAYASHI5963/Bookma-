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
        // $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SippingMethodsSeeder::class);
        $this->call(ProductConditionSeeder::class);
        $this->call(ShippingAreaSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
