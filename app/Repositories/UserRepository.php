<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
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
}