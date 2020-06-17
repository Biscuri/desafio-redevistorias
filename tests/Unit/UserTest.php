<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase {
    public function testCreateUser() {
        $response = $this->json('POST', '/users', ['user' => 'maria']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => 'maria',
            ]);
        $response = $this->json('POST', '/users', ['user' => 'maria']);
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
                    [
                        'id' => '5',
                        'hits' => '5',
                        'url' => 'https://www.google.com/search?&q=5',
                        'shortUrl' => 'https://shortn.er/shorturl_5',
                    ],
                    [
                        'id' => '4',
                        'hits' => '4',
                        'url' => 'https://www.google.com/search?&q=4',
                        'shortUrl' => 'https://shortn.er/shorturl_4',
                    ],
                    [
                        'id' => '3',
                        'hits' => '3',
                        'url' => 'https://www.google.com/search?&q=3',
                        'shortUrl' => 'https://shortn.er/shorturl_3',
                    ],
                    [
                        'id' => '2',
                        'hits' => '2',
                        'url' => 'https://www.google.com/search?&q=2',
                        'shortUrl' => 'https://shortn.er/shorturl_2',
                    ],
                    [
                        'id' => '1',
                        'hits' => '1',
                        'url' => 'https://www.google.com/search?&q=1',
                        'shortUrl' => 'https://shortn.er/shorturl_1',
                    ],
                ],
            ]);
    }
    public function testDeleteUser() {
        $response = $this->json('DELETE', '/user/joao');
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }
}
