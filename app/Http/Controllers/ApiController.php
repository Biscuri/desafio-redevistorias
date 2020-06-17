<?php

namespace App\Http\Controllers;

use App\Repositories\UrlRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller {
    protected $urlRepo;
    protected $userRepo;

    public function __construct() {
        $this->urlRepo = new UrlRepository;
        $this->userRepo = new UserRepository;
    }

    public function getUrl($id) {
        try {
            $url = $this->urlRepo->hit($id);
            return response()->redirectTo($url->url);
        } catch (Exception $e) {
            return response([], 404);
        }
    }

    public function deleteUrl($id) {
        try {
            $this->urlRepo->delete($id);
            return response([], 200);
        } catch (Exception $e) {
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

    public function createUrl(Request $request, $user) {
        $data = [
            'url' => $request->input('url'),
            'user' => $user
        ];
        $url = $this->urlRepo->create($data);
        return response()->json($url, 201);
    }

    public function createUser(Request $request) {
        try {
            $user = $this->userRepo->createUser($request->get('user'));
            return response()->json($user, 201);
        } catch (Exception $e){
            return response([], 409);
        }
    }

    public function getStatsUser($user) {
        $stats = $this->userRepo->stats($user);
        return response()->json($stats, 200);
    }

    public function deleteUser() {
        return response()->json(['success' => true], 200);
    }
}
