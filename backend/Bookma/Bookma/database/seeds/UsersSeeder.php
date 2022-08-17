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
            ['name' => 'ゲストユーザー' ,
            'email' => 'guest@guest.com' ,
            'password' => Hash::make('guestguest') ,
            'scope' => '2' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'admin' ,
            'email' => 'ad@ad.com' ,
            'password' => Hash::make('adadadad') ,
            'scope' => '1' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'シン' ,
            'email' => 'shin@gmail.com' ,
            'password' => Hash::make('shinshin') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'まっちゃん' ,
            'email' => 'mattan@gmail.com' ,
            'password' => Hash::make('matumatu') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'YOSHIKI' ,
            'email' => 'yoshiki@gmail.com' ,
            'password' => Hash::make('yosiyosi') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'usako' ,
            'email' => 'usako@gmail.com' ,
            'password' => Hash::make('usausausa') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'KEI' ,
            'email' => 'kei@gmail.com' ,
            'password' => Hash::make('ikeikeike') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'さくら' ,
            'email' => 'sakura@gmail.com' ,
            'password' => Hash::make('sakusaku') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => '岩下' ,
            'email' => 'iwa@gmail.com' ,
            'password' => Hash::make('gomigomi') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'お島' ,
            'email' => 'sima@gmail.com' ,
            'password' => Hash::make('simasima') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'ANRI' ,
            'email' => 'anri@gmail.com' ,
            'password' => Hash::make('anrianri') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'ジーク' ,
            'email' => 'zeek@gmail.com' ,
            'password' => Hash::make('zeekzeek') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'うらら' ,
            'email' => 'urara@gmail.com' ,
            'password' => Hash::make('urauraura') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'みなみ' ,
            'email' => 'minami@gmail.com' ,
            'password' => Hash::make('minamina') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'AOI' ,
            'email' => 'aoi@gmail.com' ,
            'password' => Hash::make('aoaoaoao') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'マロン' ,
            'email' => 'maron@gmail.com' ,
            'password' => Hash::make('maromaro') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'xxx' ,
            'email' => 'xxx@gmail.com' ,
            'password' => Hash::make('kisskisskiss') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'ヘルメットおじさん' ,
            'email' => 'helloji@gmail.com' ,
            'password' => Hash::make('hellhell') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'ドラケン' ,
            'email' => 'doraken@gmail.com' ,
            'password' => Hash::make('doradora') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => 'おでん' ,
            'email' => 'oden@gmail.com' ,
            'password' => Hash::make('odenoden') ,
            'scope' => '0' ,
            ]
        ]);
        DB::table("users")->insert([
            ['name' => '田中角栄' ,
            'email' => 'tanaka@gmail.com' ,
            'password' => Hash::make('tanakatanaka') ,
            'scope' => '0' ,
            ]
        ]);
    }
}
