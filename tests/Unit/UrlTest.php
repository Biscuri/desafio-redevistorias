<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Url;

class UrlTest extends TestCase {

    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed();
    }

    public function testGetUrl() {
        $response = $this->json('GET', '/urls/1');
        $response->assertRedirect('https://www.google.com/search?&q=1');
    }
    public function testGetStatsUrl() {
        $response = $this->json('GET', '/stats/1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => '1',
                'hits' => '2',
                'url' => 'https://www.google.com/search?&q=1',
                'shortUrl' => 'https://shortn.er/shorturl_1',
            ]);
    }
    public function testDeleteUrl() {
        $response = $this->json('DELETE', '/urls/1');
        $response
            ->assertStatus(200);
        $this->assertDeleted('urls', [
            'id' => '1'
        ]);
    }
    public function testGetStats() {
        $response = $this->json('GET', '/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'hits' => '121',
                'urlCount' => '15',
                'topUrls' => [
                    [
                        'id' => '15',
                        'hits' => '15',
                        'url' => 'https://www.google.com/search?&q=15',
                        'shortUrl' => 'https://shortn.er/shorturl_15',
                    ],
                    [
                        'id' => '14',
                        'hits' => '14',
                        'url' => 'https://www.google.com/search?&q=14',
                        'shortUrl' => 'https://shortn.er/shorturl_14',
                    ],
                    [
                        'id' => '13',
                        'hits' => '13',
                        'url' => 'https://www.google.com/search?&q=13',
                        'shortUrl' => 'https://shortn.er/shorturl_13',
                    ],
                    [
                        'id' => '12',
                        'hits' => '12',
                        'url' => 'https://www.google.com/search?&q=12',
                        'shortUrl' => 'https://shortn.er/shorturl_12',
                    ],
                    [
                        'id' => '11',
                        'hits' => '11',
                        'url' => 'https://www.google.com/search?&q=11',
                        'shortUrl' => 'https://shortn.er/shorturl_11',
                    ],
                    [
                        'id' => '10',
                        'hits' => '10',
                        'url' => 'https://www.google.com/search?&q=10',
                        'shortUrl' => 'https://shortn.er/shorturl_10',
                    ],
                    [
                        'id' => '9',
                        'hits' => '9',
                        'url' => 'https://www.google.com/search?&q=9',
                        'shortUrl' => 'https://shortn.er/shorturl_9',
                    ],
                    [
                        'id' => '8',
                        'hits' => '8',
                        'url' => 'https://www.google.com/search?&q=8',
                        'shortUrl' => 'https://shortn.er/shorturl_8',
                    ],
                    [
                        'id' => '7',
                        'hits' => '7',
                        'url' => 'https://www.google.com/search?&q=7',
                        'shortUrl' => 'https://shortn.er/shorturl_7',
                    ],
                    [
                        'id' => '6',
                        'hits' => '6',
                        'url' => 'https://www.google.com/search?&q=6',
                        'shortUrl' => 'https://shortn.er/shorturl_6',
                    ],
                ],
            ]);
    }
    public function testCreateUrl() {
        $response = $this->json('POST', '/users/joao/urls', ['url' => 'https://www.google.com/search?q=rede+vistorias']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'hits' => '16',
                'id' => '16',
                'shortUrl' => 'https://shortn.er/shorturl_16',
                'url' => 'https://www.google.com/search?&q=16',
            ]);
    }
}
