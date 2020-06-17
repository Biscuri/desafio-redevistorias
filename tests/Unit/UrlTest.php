<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase {

    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed();
    }

    public function testGetUrl() {
        $response = $this->json('GET', '/urls/shorturl_0');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStatsUrl() {
        $response = $this->json('GET', '/stats/shorturl_0');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testDeleteUrl() {
        $response = $this->json('DELETE', '/urls/shorturl_0');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testGetStats() {
        $response = $this->json('GET', '/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
    public function testCreateUrl() {
        $response = $this->json('POST', '/users/joao/urls', ['url' => 'https://www.google.com/search?q=rede+vistorias']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
