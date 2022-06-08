<?php

namespace Tests\Feature;

use App\Enums\Status;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testIndexUnauthenticated()
    {
        $response = $this->get('/api/user');
        $response->assertUnauthorized();
    }

    public function testIndexAuthenticated()
    {
        $loginResponse = $this->post('/api/login',
            [
                'email' => 'admin@test.com',
                'password' => 'admin'
            ]
        );
        $loginResponse->assertStatus(Status::Created->value);
        $content = \Nette\Utils\Json::decode($loginResponse->getContent());
        $response = $this->get('/api/user', ['Authorization'=> "Bearer $content->token"]);
        $response->assertStatus(200);
    }
}
