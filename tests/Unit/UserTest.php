<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase {
    public function testCreateUser() {
        $response = $this->json('POST', '/users/', ['user' => 'maria']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStatsUser() {
        $response = $this->json('GET', '/users/joao/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testDeleteUser() {
        $response = $this->json('DELETE', '/user/joao');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
