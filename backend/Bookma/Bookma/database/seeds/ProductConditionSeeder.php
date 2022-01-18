<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCondition;

class ProductConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("product_conditions")->insert([
            'condition' => '新品・未使用' ,
           ]);
          DB::table("product_conditions")->insert([
            'condition' => '未使用に近い' ,
           ]);
          DB::table("product_conditions")->insert([
            'condition' => '目立った傷や汚れなし' ,
           ]);
          DB::table("product_conditions")->insert([
            'condition' => 'やや傷や汚れあり' ,
           ]);
          DB::table("product_conditions")->insert([
            'condition' => '傷や汚れあり' ,
           ]);
          DB::table("product_conditions")->insert([
            'condition' => '全体的に状態が悪い' ,
           ]);
    }
}
