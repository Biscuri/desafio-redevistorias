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

    public function testGetStatsUrl() {
        $response = $this->json('GET', '/stats/shorturl_1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 'shorturl_1',
                'hits' => '1',
                'url' => 'https://www.google.com/search?&q=1',
                'shortUrl' => 'https://shortn.er/shorturl_1',
                'user_id' => 'joao'
            ]);
    }

    public function testGetUrl() {
        $response = $this->json('GET', '/urls/shorturl_1');
        $response->assertRedirect('https://www.google.com/search?&q=1');
        
        $response = $this->json('GET', '/urls/foo');
        $response->assertStatus(404);
    }

    public function testUrlHit(){
        $response = $this->json('GET', '/urls/shorturl_1');
        $response->assertRedirect('https://www.google.com/search?&q=1');

        $response = $this->json('GET', '/stats/shorturl_1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 'shorturl_1',
                'hits' => '2',
                'url' => 'https://www.google.com/search?&q=1',
                'shortUrl' => 'https://shortn.er/shorturl_1',
                'user_id' => 'joao'
            ]);
    }

    public function testDeleteUrl() {
        $response = $this->json('DELETE', '/urls/1');
        $response
            ->assertStatus(200);
        $this->assertDeleted('urls', [
            'id' => 'shorturl_1'
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
                        'id' => 'shorturl_15',
                        'hits' => '15',
                        'url' => 'https://www.google.com/search?&q=15',
                        'shortUrl' => 'https://shortn.er/shorturl_15',
                    ],
                    [
                        'id' => 'shorturl_14',
                        'hits' => '14',
                        'url' => 'https://www.google.com/search?&q=14',
                        'shortUrl' => 'https://shortn.er/shorturl_14',
                    ],
                    [
                        'id' => 'shorturl_13',
                        'hits' => '13',
                        'url' => 'https://www.google.com/search?&q=13',
                        'shortUrl' => 'https://shortn.er/shorturl_13',
                    ],
                    [
                        'id' => 'shorturl_12',
                        'hits' => '12',
                        'url' => 'https://www.google.com/search?&q=12',
                        'shortUrl' => 'https://shortn.er/shorturl_12',
                    ],
                    [
                        'id' => 'shorturl_11',
                        'hits' => '11',
                        'url' => 'https://www.google.com/search?&q=11',
                        'shortUrl' => 'https://shortn.er/shorturl_11',
                    ],
                    [
                        'id' => 'shorturl_10',
                        'hits' => '10',
                        'url' => 'https://www.google.com/search?&q=10',
                        'shortUrl' => 'https://shortn.er/shorturl_10',
                    ],
                    [
                        'id' => 'shorturl_9',
                        'hits' => '9',
                        'url' => 'https://www.google.com/search?&q=9',
                        'shortUrl' => 'https://shortn.er/shorturl_9',
                    ],
                    [
                        'id' => 'shorturl_8',
                        'hits' => '8',
                        'url' => 'https://www.google.com/search?&q=8',
                        'shortUrl' => 'https://shortn.er/shorturl_8',
                    ],
                    [
                        'id' => 'shorturl_7',
                        'hits' => '7',
                        'url' => 'https://www.google.com/search?&q=7',
                        'shortUrl' => 'https://shortn.er/shorturl_7',
                    ],
                    [
                        'id' => 'shorturl_6',
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
                'id' => 'shorturl_16',
                'shortUrl' => 'https://shortn.er/shorturl_16',
                'url' => 'https://www.google.com/search?&q=16',
            ]);
    }
}
