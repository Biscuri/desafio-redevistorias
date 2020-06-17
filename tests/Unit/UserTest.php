<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testCreateUser(){
        $response = $this->json('POST', '/api/users/', ['user' => 'maria']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStatsUser(){
        $response = $this->json('GET', '/api/users/joao/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testDeleteUser(){
        $response = $this->json('DELETE', '/api/user/joao');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}