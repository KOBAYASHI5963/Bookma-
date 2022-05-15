<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            ['name' => 'admin' ,
            'email' => 'ad@ad.com' ,
            'password' => Hash::make('adadadad') ,
            'scope' => '1' ,
            ]
        ]);
    }
}
