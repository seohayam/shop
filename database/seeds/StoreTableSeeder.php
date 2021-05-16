<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * name        
     */
    public function run()
    {
        DB::table('stores')->insert([
            [                             
                'name' => "カフェカフェダ",
                'adress' => "〒105-0011 東京都港区芝公園４丁目２−８",
                'description' => "とても素晴らしい外観とお茶が売りのお店になっておりまする。",
                'available' => "10",
                'store_url' => "https://sample-site-coshop.studio.site/",    
                'store_owner_id' => '1',   
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),         
            ],            
        ]);
    }
}
