<?php

namespace App\Http\Controllers;

use App\Repositories\UrlRepository;
use App\Repositories\UserRepository;

class ApiController extends Controller {
    protected $urlRepo;
    protected $userRepo;

    public function __construct() {
        $this->urlRepo = new UrlRepository;
        $this->userRepo = new UserRepository;
    }

    public function getUrl() {
        return response()->json(['success' => true], 200);
    }
    public function deleteUrl() {
        return response()->json(['success' => true], 200);
    }
    public function getStats() {
        return response()->json(['success' => true], 200);
    }
    public function getStatsUrl() {
        return response()->json(['success' => true], 200);
    }
    public function createUser() {
        return response()->json(['success' => true], 200);
    }
    public function createUrl() {
        return response()->json(['success' => true], 200);
    }
    public function getStatsUser() {
        return response()->json(['success' => true], 200);
    }
    public function deleteUser() {
        return response()->json(['success' => true], 200);
    }
}
