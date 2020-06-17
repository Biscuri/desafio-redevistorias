<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase {

    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed();
    }

    public function testCreateUser() {
        $response = $this->json('POST', '/users', ['user' => 'leno']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => 'leno',
            ]);
        $response = $this->json('POST', '/users', ['user' => 'leno']);
        $response
            ->assertStatus(409);
    }

    public function testGetStatsUser() {
        $response = $this->json('GET', '/users/joao/stats');
        $response
            ->assertStatus(200)
            ->assertJson([
                'hits' => '55',
                'urlCount' => '10',
                'topUrls' => [
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
                    [
                        'id' => 'shorturl_5',
                        'hits' => '5',
                        'url' => 'https://www.google.com/search?&q=5',
                        'shortUrl' => 'https://shortn.er/shorturl_5',
                    ],
                    [
                        'id' => 'shorturl_4',
                        'hits' => '4',
                        'url' => 'https://www.google.com/search?&q=4',
                        'shortUrl' => 'https://shortn.er/shorturl_4',
                    ],
                    [
                        'id' => 'shorturl_3',
                        'hits' => '3',
                        'url' => 'https://www.google.com/search?&q=3',
                        'shortUrl' => 'https://shortn.er/shorturl_3',
                    ],
                    [
                        'id' => 'shorturl_2',
                        'hits' => '2',
                        'url' => 'https://www.google.com/search?&q=2',
                        'shortUrl' => 'https://shortn.er/shorturl_2',
                    ],
                    [
                        'id' => 'shorturl_1',
                        'hits' => '1',
                        'url' => 'https://www.google.com/search?&q=1',
                        'shortUrl' => 'https://shortn.er/shorturl_1',
                    ],
                ],
            ]);
    }

    public function testDeleteUser() {
        $this->markTestSkipped();
        $response = $this->json('DELETE', '/user/joao');
        $response
            ->assertStatus(200);
        $this->assertDeleted('users', [
            'id' => 'shorturl_joao',
        ]);
    }
}
