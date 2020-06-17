<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use App\Url;
use Exception;
use Illuminate\Support\Facades\Cache;

class UrlRepository {
    public function hit($id) {
        if (Cache::has($id)){
            $url = Cache::pull($id, null);
        } else {
            $url = Url::find($id);
        }
        if ($url){
            $url->hits++;
            $url->save();
            Cache::put($id, $url);
            return $url;
        } else {
            throw new Exception("Url not found");
        }
    }
    public function stats($id) {
        return Url::find($id);
    }
    public function globalStats(){
        
    }
    public function create($data) {
        $url = new Url();
        $url->url = $data['url'];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < 10; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        $url->shortUrl = request()->getSchemeAndHttpHost().'/'.$string;
        $url->user_id = $data['user'];
        $url->save();

        return $url;
    }
    public function delete($data) {
    }
}