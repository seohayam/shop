<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [                
                'title' => "タオル",
                'descripotion' => "これは上質なタオルとなっております！",
                'value' => 1000,
                'item_url' => 'https://www.amazon.co.jp/%E3%80%90Amazon-co-jp%E9%99%90%E5%AE%9A%E3%80%91%E3%82%BF%E3%82%AA%E3%83%AB%E7%A0%94%E7%A9%B6%E6%89%80-%E3%83%9C%E3%83%AA%E3%83%A5%E3%83%BC%E3%83%A0%E3%83%AA%E3%83%83%E3%83%81-003-%E3%82%B5%E3%83%B3%E3%83%89%E3%83%99%E3%83%BC%E3%82%B8%E3%83%A5-Technology/dp/B086WBLKTB/ref=pd_rhf_gw_p_img_2?_encoding=UTF8&psc=1&refRID=1W86JSS4GVQKXZCYHQYS',
                'user_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [                
                'title' => "本",
                'descripotion' => "これは前代未聞の作品です！",
                'value' => 1200,
                'item_url' => 'https://www.amazon.co.jp/%E3%80%90Amazon-co-jp%E9%99%90%E5%AE%9A%E3%80%91%E3%82%BF%E3%82%AA%E3%83%AB%E7%A0%94%E7%A9%B6%E6%89%80-%E3%83%9C%E3%83%AA%E3%83%A5%E3%83%BC%E3%83%A0%E3%83%AA%E3%83%83%E3%83%81-003-%E3%82%B5%E3%83%B3%E3%83%89%E3%83%99%E3%83%BC%E3%82%B8%E3%83%A5-Technology/dp/B086WBLKTB/ref=pd_rhf_gw_p_img_2?_encoding=UTF8&psc=1&refRID=1W86JSS4GVQKXZCYHQYS',
                'user_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
