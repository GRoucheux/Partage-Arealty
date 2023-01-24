<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_seeAll_users()
    {
        $response = $this->get('api/seeAll');

        $response->assertStatus(200);
    }

    public function test_seeAll_posts()
    {
        $response = $this->get('api/seeAllPosts');
        $response->assertStatus(200);
    }

    public function test_seeAll_coms()
    {
        $response = $this->get('api/seeAllCom');
        $response->assertStatus(200);
    }

    
    public function test_seeAll_like_post()
    {
        $response = $this->get('api/seeAllLikePost');
        $response->assertStatus(200);
    }

    public function test_create_user()
    {
        $response = $this->postJson('/api/showOneUser', ['username' => 'laravel01',
                                                         'name' => 'laravel',
                                                         'lastname' => 'lagrandefolle',
                                                         'email' => 'laravel@cetruc.com',
                                                         'password' => 'motdepasecomplique',
                                                         'admin' => 'O' ]);
        $response
            ->assertStatus(200);
    }

    public function test_show_oneUser_by_username()
    {
        $response = $this->postJson('/api/showOneUser', ['username' => 'laravel01']);
        $response
            ->assertStatus(200);
    }

}
