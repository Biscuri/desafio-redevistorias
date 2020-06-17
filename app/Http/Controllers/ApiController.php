<?php

namespace App\Http\Controllers;

use App\Repositories\UrlRepository;
use App\Repositories\UserRepository;
use Exception;

class ApiController extends Controller {
    protected $urlRepo;
    protected $userRepo;

    public function __construct() {
        $this->urlRepo = new UrlRepository;
        $this->userRepo = new UserRepository;
    }

    public function getUrl($id) {
        try{
            $url = $this->urlRepo->hit($id);
            return response()->redirectTo($url->url);
        } catch (Exception $e){
            return response([], 404);
        }
    }
    public function deleteUrl($id) {
        try {
            $this->urlRepo->delete($id);
            return response([], 200);
        } catch (Exception $e){
            return response([], 404);
        }
    }
    public function getStats() {
        $stats = $this->urlRepo->globalStats();
        return response()->json($stats, 200);
    }
    public function getStatsUrl($id) {
        $url = $this->urlRepo->stats($id);
        return response()->json($url, 200);
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
