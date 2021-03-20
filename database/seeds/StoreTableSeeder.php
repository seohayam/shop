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
                'id'=> "1",
                'name' => "カフェカフェダ",
                'adress' => "abcd-1-391-10-13231",
                'description' => "とても素晴らしい外観とお茶が売りのお店になっておりまする。",
                'available' => "10",
                'store_url' => "nothing",                
            ],
            [             
                'id' => "2",  
                'name' => "カフェラフランス",
                'adress' => "13-312312312-2023223-10-13231",
                'description' => "西洋のお店風なお店です。",
                'available' => "5",
                'store_url' => "nothing",                
            ],                  
        ]);
    }
}
