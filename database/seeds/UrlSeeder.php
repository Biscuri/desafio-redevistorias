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
        for ($i = 1 ; $i <= 10 ; $i++){
            DB::table('urls')->insert([
                'id' => 'shorturl_'.$i,
                'hits' => $i,
                'shortUrl' => 'https://shortn.er/shorturl_'.$i,
                'url' => 'https://www.google.com/search?&q='.$i,
                'user_id' => 'joao'
            ]);
        }
        for ($i = 11 ; $i <= 15 ; $i++){
            DB::table('urls')->insert([
                'id' => 'shorturl_'.$i,
                'hits' => $i,
                'shortUrl' => 'https://shortn.er/shorturl_'.$i,
                'url' => 'https://www.google.com/search?&q='.$i,
                'user_id' => 'maria'
            ]);
        }
    }
}
