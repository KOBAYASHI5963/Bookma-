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
            'profile_image' => 'https://toyokeizai.net/articles/-/412218?page=2' ,
            'introduce' => 'まだ始めたばかりで至らない点があるかと思いますがご了承下さい。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '2' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRanSBP9xrfaq6j6YE05Tz0UckAEcqQPeti2w&usqp=CAU' ,
            'introduce' => 'よろしくお願いします。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '3' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQK_uixGUfDN4gl1WTXDiSXI4SE_XNDSfG4wg&usqp=CAU' ,
            'introduce' => '始めたばかりので、分からない事が多々ありますが、よろしくお願いしますm(_ _)m' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '4' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRanSBP9xrfaq6j6YE05Tz0UckAEcqQPeti2w&usqp=CAU' ,
            'introduce' => '基本的に使用しなくなったものなどを出品しております。ご購入後のクレーム、返品等は出来ませんのでご了承ください。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '5' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpvD1Cn2TN5Z5wOI5WO8B1UGOW5uQbx0DliA&usqp=CAU' ,
            'introduce' => '観覧ありがとうございます(*^^*)お値下げ交渉可能ですのでコメントよろしくお願いします(_ _)(常識範囲内でお願いいたします)' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '6' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjnMjnk-_-mQloeoY3LbWkki5J6n-tot_-TQ&usqp=CAU' ,
            'introduce' => 'はじめまして！
            新しい貰い手さんに出逢えたらと思っております(●︎´▽︎`●︎)
            気になった方や、お値下げ交渉などお気軽にコメント下さいね！！' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '7' ,
            'profile_image' => 'null' ,
            'introduce' => 'ご覧いただきありがとうございます。
            今までは購入専門でしたが、不要な物などを出品していきたいと思います(^^)☆
            ' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '8' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQK4wNarXi2_jZWksiHAYZAQbSTznRNACO8Cw&usqp=CAU' ,
            'introduce' => '数ある中から、お立ち寄りありがとうございますm(__)m
            値下げ交渉などは、お気軽にお声かけ下さい。

            大幅な値下げはできませんが、気持ち程度ならできます！
            ' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '9' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn5KJMc9qyBvT69E1bF3aPa6ZKL5vFwlPDnA&usqp=CAU' ,
            'introduce' => '皆様，宜しくお願い致します❤︎*.(´͈ ˘ `͈).*❤︎
            ' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '10' ,
            'profile_image' => 'null' ,
            'introduce' => 'はじめまして。
            常にスムーズな気持ちの良いお取引を
            心掛けております。
            宜しくお願い致します。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '11' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkn258bVCld6ulGuqLHnx6Vy6Oc0ptdI5NQg&usqp=CAU' ,
            'introduce' => '初心者ですが不手際のないよう努めます。宜しく御願いします。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '12' ,
            'profile_image' => 'null' ,
            'introduce' => 'よろしくお願いします(^^)' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '13' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREQrjj4FPvw6xcNpXYcUQdor3eunm2n4uvUA&usqp=CAU' ,
            'introduce' => 'こんにちわ( ¨̮ )即購入していただいて大丈夫です(^^)
            壊れ物など保証や追跡をご希望の方は購入前にご相談ください。
            
            基本的に発送は平日のみとさせていただきます。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '14' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJhIvFEL0oTQXeSMbkucPXOC_9Xm0thnDCNg&usqp=CAU' ,
            'introduce' => 'ご覧いただきありがとうございます！
            気持ちの良い取引を心がけています。
            コメント等いただいてる場合でも、先に購入された方を優先いたします。
            発送は、基本的に平日のみです。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '15' ,
            'profile_image' => 'null' ,
            'introduce' => 'はじめまして！
            ご覧いただき、ありがとうございます。' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '16' ,
            'profile_image' => 'null' ,
            'introduce' => 'ご縁がありましたら、よろしくお願いいたします！' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '17' ,
            'profile_image' => 'null' ,
            'introduce' => '◆ご覧くださり、ありがとうございます！' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '18' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJhIvFEL0oTQXeSMbkucPXOC_9Xm0thnDCNg&usqp=CAU' ,
            'introduce' => 'こんにちは！' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '19' ,
            'profile_image' => 'null' ,
            'introduce' => '気持ちの良いお取り置きが出来ます様、どうぞ
            よろしくお願い致します^ ^' ,
            ]
        ]);
        DB::table("user_profiles")->insert([
            [
            'user_id' => '20' ,
            'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpvD1Cn2TN5Z5wOI5WO8B1UGOW5uQbx0DliA&usqp=CAU' ,
            'introduce' => '☆迅速、かつ丁寧な取引きを心掛けております。
            出来る限り皆様のご要望にお応えしたいと
            思いながら作成しております♡
            よろしくお願いします(^-^)' ,
            ]
        ]);
    }
}
