<?php

namespace App\Repositories;

use App\Url;
use App\User;
use Exception;

class UserRepository {
    public function createUser($user) {
        $user = User::firstOrCreate(['id' => $user]);
        if (!$user->wasRecentlyCreated) {
            throw new Exception("Usuário já existente");
        }
        return $user;
    }

    public function stats($id) {
        $stats = [];
        $stats['hits'] = Url::where('user_id', $id)->sum('hits');
        $stats['urlCount'] = Url::where('user_id', $id)->count('*');
        $stats['topUrls'] = Url::where('user_id', $id)->orderBy('hits', 'DESC')->take(10)->get()->toArray();
        foreach ($stats['topUrls'] as &$url) {
            unset($url['user_id']);
        }
        return $stats;
    }

    public function delete($id) {
        $user = User::find($id);
        if ($user){
            Url::where('user_id', $id)->delete();
            $user->delete();
        } else {
            throw new Exception("Url not found");
        }
    }
}