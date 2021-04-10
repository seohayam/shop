<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'application_id' => 1,
                'content' => 'こんにちは',
                'from_user_id' => 1,
                'to_store_owner_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]            
        ]);    
    }
}
