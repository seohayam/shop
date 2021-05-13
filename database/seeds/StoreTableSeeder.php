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
                'adress' => "千葉県浦安市舞浜１−１３",
                'description' => "とても素晴らしい外観とお茶が売りのお店になっておりまする。",
                'available' => "10",
                'store_url' => "nothing",    
                'store_owner_id' => '1',   
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),         
            ],            
        ]);
    }
}
