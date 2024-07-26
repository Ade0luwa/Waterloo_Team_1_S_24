<?php
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    protected function setUp(): void
    {
        // Initialize the session for each test
        $_SESSION = [];
    }

    public function testIndexPageContainsWelcomeMessage()
    {
        // Simulate a request to index.php
        $response = file_get_contents('http://localhost/Waterloo_Team_1_S_24/index.php');
        
        // Check for the presence of the welcome message
        $expectedMessage = 'looking to book a cocktail party, post-work';
        
        // Check if the message is present in the response
        $this->assertStringContainsString(
            $expectedMessage,
            $response,
            'Index page should contain the welcome message'
        );
    }

    public function testNavigationButtonsVisible()
    {
        // Simulate a request to index.php
        $response = file_get_contents('http://localhost/Waterloo_Team_1_S_24/index.php');

        // Define the navigation buttons text
        $buttons = ['Home', 'Venues', 'Events', 'About', 'Contact'];

        foreach ($buttons as $button) {
            $this->assertStringContainsString(
                $button,
                $response,
                "{$button} button should be visible on the index page"
            );
        }
    }
}
