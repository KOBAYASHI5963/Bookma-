<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_profiles")->insert([
            [
            'user_id' => '1' ,
            'profile_image' => 'null' ,
            'introduce' => 'null' ,
            ]
        ]);
    }
}
