<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
          'name' => '小説・文学' ,
         ]);
        DB::table("categories")->insert([
          'name' => '経済・ビジネス' ,
         ]);
        DB::table("categories")->insert([
          'name' => '漫画・コミック' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'ライトノベル' ,
         ]);
        DB::table("categories")->insert([
          'name' => '暮らし・実用' ,
         ]);
        DB::table("categories")->insert([
          'name' => '雑誌' ,
         ]);
        DB::table("categories")->insert([
          'name' => '文庫' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'エッセイ・自伝・ノンフィクション' ,
         ]);
        DB::table("categories")->insert([
          'name' => '歴史・地理・民俗' ,
         ]);
        DB::table("categories")->insert([
          'name' => '新書・選書・ブックレット' ,
         ]);
        DB::table("categories")->insert([
          'name' => '言語・語学・辞典' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'コンピュータ・IT・情報科学' ,
         ]);
        DB::table("categories")->insert([
          'name' => '自然科学・環境' ,
         ]);
        DB::table("categories")->insert([
          'name' => '技術・工学・農学' ,
         ]);
        DB::table("categories")->insert([
          'name' => '医学' ,
         ]);
        DB::table("categories")->insert([
          'name' => '社会・時事・政治・行政' ,
         ]);
        DB::table("categories")->insert([
          'name' => '哲学・思想・宗教・心理' ,
         ]);
        DB::table("categories")->insert([
          'name' => '法学・法律' ,
         ]);
        DB::table("categories")->insert([
          'name' => '資格・検定・就職' ,
         ]);
        DB::table("categories")->insert([
          'name' => '教育・学習参考書' ,
         ]);
        DB::table("categories")->insert([
          'name' => '趣味・ホビー' ,
         ]);
        DB::table("categories")->insert([
          'name' => '旅行・地図' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'エンタメ・テレビ・タレント' ,
         ]);
        DB::table("categories")->insert([
          'name' => '芸術・アート' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'ゲーム・アニメ・サブカルチャー' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'スポーツ' ,
         ]);
        DB::table("categories")->insert([
          'name' => '児童書・絵本' ,
         ]);
        DB::table("categories")->insert([
          'name' => '写真集' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'ラブロマンス' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'BL（ボーイズラブ）' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'TL（ティーンズラブ）' ,
         ]);
        DB::table("categories")->insert([
          'name' => 'オーディオブック' ,
         ]);
    }
}
