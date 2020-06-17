<?php

namespace App\Http\Controllers;

class ApiController extends Controller {
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
