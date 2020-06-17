<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use App\Url;
use Exception;
use App\User;

class UserRepository {
    public function createUser($user){
        $user = User::firstOrCreate(['id' => $user]);
        if (!$user->wasRecentlyCreated){
            throw new Exception("Usuário já existente");
        }
        return $user;
    }

    public function stats($user){
        $stats = [];
        $stats['hits'] = Url::where('user_id', $user)->sum('hits');
        $stats['urlCount'] = Url::where('user_id', $user)->count('*');
        $stats['topUrls'] = Url::where('user_id', $user)->orderBy('hits', 'DESC')->take(10)->get()->toArray();
        foreach ($stats['topUrls'] as &$url){
            unset($url['user_id']);
        }
        return $stats;
    }
}