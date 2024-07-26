<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class VenueBookingIntegrationTest extends TestCase
{
    private $client;
    private $cookieJar;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/Waterloo_Team_1_S_24/login.php',
            'http_errors' => false, 
        ]);

        $this->cookieJar = new CookieJar();
    }

    public function testVenueListingAndBookingIntegration()
    {
        // Step 1: Fetch Venue Listings
        $listResponse = $this->client->get('http://localhost/Waterloo_Team_1_S_24/index.php?page=venue',[
            'cookies' => $this->cookieJar 
        ]); 
        $this->assertEquals(200, $listResponse->getStatusCode(), 'Failed to fetch venue listings.');

        $listBody = $listResponse->getBody()->getContents();
        $this->assertStringContainsString('Venue 2', $listBody);

        // Step 2: Book a Venue
        $bookingResponse = $this->client->post('booking.php', [
            'form_params' => [
                'venue_id' => 1,
                'user_id' => 2,
                'date' => '2024-08-01',
                'time' => '12:00 PM',
                'duration' => 2
            ],
            'cookies' => $this->cookieJar // Use cookies to maintain session
        ]);

        $this->assertEquals(200, $bookingResponse->getStatusCode(), 'Failed to book the venue.');

        }
}
