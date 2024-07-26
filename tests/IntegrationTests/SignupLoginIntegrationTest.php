<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class SignupLoginIntegrationTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        // Initialize the GuzzleHTTP client
        $this->client = new Client([
            'base_uri' => 'http://localhost/Waterloo_Team_1_S_24/login.php', // Change this to your localhost or testing URL
            'http_errors' => false,
        ]);
    }

    public function testSignupAndLoginIntegration()
    {
        //Sign Up a New User
        $signupResponse = $this->client->post('signup.php', [
            'form_params' => [
                'name' => 'Adeoluwatomiwa',
                'username' => 'Gbesh',
                'email' => 'gbesh@gmail.com',
                'password' => 'testing',
                'cpassword' => 'testing',
            ]
        ]);

        // Check if signup was successful
        $this->assertEquals(200, $signupResponse->getStatusCode());
        
        // Log In with New Credentials
        $loginResponse = $this->client->post('login.php', [
            'form_params' => [
                'username' => 'testuser',
                'password' => 'testpassword',
            ]
        ]);

        // Check if login was successful
        $this->assertEquals(200, $loginResponse->getStatusCode());
        $indexResponse = $this->client->get('index.php');
        $this->assertEquals(200, $indexResponse->getStatusCode());
    }
}
