<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class VenueTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $mockConn;

    /**
     * @var MockObject
     */
    private $mockResult;

    protected function setUp(): void
    {
        // Mock the database connection
        $this->mockConn = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Mock the mysqli_result
        $this->mockResult = $this->getMockBuilder(mysqli_result::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Define mock data to be returned from the database
        $mockData = [
            [
                'id' => 1,
                'venue' => 'Grand Hall',
                'address' => '123 Main St',
                'description' => 'Spacious venue for events',
                'rate' => 150.00,
            ],
            [
                'id' => 2,
                'venue' => 'Conference Room',
                'address' => '456 Elm St',
                'description' => 'Perfect for meetings and seminars',
                'rate' => 75.00,
            ],
        ];

        // Configure the mysqli_result mock
        $this->mockResult->method('fetch_assoc')
            ->willReturnMap([
                [0, $mockData[0]],
                [1, $mockData[1]],
                [2, null] // After all rows, return null
            ]);

        // Mock the query method to return the mysqli_result mock
        $this->mockConn->method('query')
            ->with($this->stringContains("SELECT * from venue order by rand()"))
            ->willReturn($this->mockResult);

        // Assign mock connection to global scope (simulate the include)
        $GLOBALS['conn'] = $this->mockConn;
    }

    public function testVenuePageOutput()
    {
        // Start output buffering to capture output
        ob_start();
        include 'venue.php';
        $output = ob_get_clean(); // Capture the output

        // Check if buttons are present
        $this->assertStringContainsString('class="btn btn-themec book-venue align-self-end" type="button" data-id=\'1\'', $output);
        $this->assertStringContainsString('class="btn btn-themec book-venue align-self-end" type="button" data-id=\'2\'', $output);
    }
}
