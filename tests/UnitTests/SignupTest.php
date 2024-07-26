<?php

use PHPUnit\Framework\TestCase;

// Include the file where your functions are defined
require_once 'signup.php';

class SignupTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        // Create a mock database connection
        $this->conn = $this->createMock(mysqli::class);
    }

    public function testValidateInputSuccess()
    {
        $this->assertTrue(validateInput('Adeolu', 'Adeolu', 'Ade@gmail.com', 'adeolu', 'adeolu'));
    }

    public function testValidateInputFailure()
    {
        $this->assertFalse(validateInput('', 'adeolu', 'ade@gmail.com', 'password', 'password')); // leaving username field blank
        $this->assertFalse(validateInput('Edikan Ekanem', '', 'didi@gmail.com', 'password', 'password')); // leaving name field blank
        $this->assertFalse(validateInput('Adeolu', 'Edikan', '', 'password', 'password')); // Empty email
        $this->assertFalse(validateInput('Harsh', 'Shad', '', 'password', 'password')); // Invalid email
        $this->assertFalse(validateInput('Adeolu', 'Promila', 'promila@yahoo.com', 'password', 'p@ssw0rd')); // Passwords do not match
    }

    public function testHashPassword()
    {
        $password = 'password123';
        $hash = hashPassword($password);

        // Verify that the hashed password matches the original password
        $this->assertTrue(password_verify($password, $hash));
    }

    public function testInsertUserSuccess()
    {
        // Create a mock statement
        $stmt = $this->createMock(mysqli_stmt::class);
        $stmt->method('execute')->willReturn(true);
        $this->conn->method('prepare')->willReturn($stmt);

        $hash = hashPassword('password');

        // Check if insertUser returns true for successful execution
        $this->assertTrue(insertUser($this->conn, 'Adeolu', 'Adeolu', 'ade@yopmail.com', $hash));
    }

    public function testInsertUserFailure()
    {
        // Create a mock statement
        $stmt = $this->createMock(mysqli_stmt::class);
        $stmt->method('execute')->willReturn(false);
        $this->conn->method('prepare')->willReturn($stmt);

        $hash = hashPassword('password');

        // Check if insertUser returns false for failed execution
        $this->assertFalse(insertUser($this->conn, 'ade', 'ade', 'ade@yopmail.com', $hash));
    }

    
}
