<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i < 5 ; $i++){
            $id = Str::random(10);
            DB::table('urls')->insert([
                'id' => $id,
                'shortUrl' => 'http://shortn.er/'.$id,
                'url' => 'http://'.Str::random(10).'.com',
                'user_id' => 'joao'
            ]);
        }
    }
}
