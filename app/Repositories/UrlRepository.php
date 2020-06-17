<?php

namespace App\Repositories;

use App\Url;
use Exception;
use Illuminate\Support\Facades\Cache;

class UrlRepository {
    public function hit($id) {
        if (Cache::has($id)) {
            $url = Cache::pull($id, null);
        } else {
            $url = Url::find($id);
        }
        if ($url) {
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

    public function globalStats() {
        $stats = [];
        $stats['hits'] = Url::sum('hits');
        $stats['urlCount'] = Url::count('*');
        $stats['topUrls'] = Url::orderBy('hits', 'DESC')->take(10)->get()->toArray();
        foreach ($stats['topUrls'] as &$url) {
            unset($url['user_id']);
        }
        return $stats;
    }

    public function create($data) {
        $url = new Url();
        $url->url = $data['url'];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < 10; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        $url->id = $string;
        $url->hits = '0';
        $url->shortUrl = request()->getSchemeAndHttpHost() . '/' . $string;
        $url->user_id = $data['user'];
        $url->save();

        $url = $url->toArray();
        unset($url['user_id']);
        return $url;
    }

    public function delete($id) {
        $url = Url::find($id);
        if ($url) {
            $url->delete();
        } else {
            throw new Exception("Url not found");
        }
    }
}