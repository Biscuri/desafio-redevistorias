<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    public function testGetUrl(){
        $response = $this->json('GET', '/api/urls/BPpaMOzwmn');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testDeleteUrl(){
        $response = $this->json('DELETE', '/api/urls/BPpaMOzwmn');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStats(){
        $response = $this->json('GET', '/api/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStatsUrl(){
        $response = $this->json('GET', '/api/stats/HSqtGHwJ5J');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testCreateUrl(){
        $response = $this->json('POST', '/api/users/joao/urls', ['url' => 'novaurl']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
