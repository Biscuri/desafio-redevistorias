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
            $id = 'shorturl_'.$i;
            DB::table('urls')->insert([
                'id' => $id,
                'shortUrl' => 'https://shortn.er/'.$id,
                'url' => 'https://www.google.com/search?&q='.$i,
                'user_id' => 'joao'
            ]);
        }
    }
}
