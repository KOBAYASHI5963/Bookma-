<?php

use Illuminate\Database\Seeder;
use App\Models\SippingMethod;

class SippingMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("shipping_methods")->insert([
            'means' => '未定' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'ゆうメール' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'レターパック' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => '普通郵便（定形・定形外）' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'クロネコヤマト' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'ゆうパック' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'クリックポスト' ,
           ]);
        DB::table("shipping_methods")->insert([
            'means' => 'ゆうパケット' ,
           ]);
    }
}
