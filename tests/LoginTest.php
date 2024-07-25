<?php

require_once 'login.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class LoginTest extends TestCase
{

    public function testHtmlContainsUsernameField()
    {
        $html = file_get_contents('login.php'); 
        $this->assertStringContainsString('<input type="text" id="username" name="username"', $html);
    }

    public function testHtmlContainsPasswordField()
    {
        $html = file_get_contents('login.php');
        $this->assertStringContainsString('<input type="password" id="password" name="password"', $html);
    }

    public function testHtmlContainsLoginButton()
    {
        $html = file_get_contents('login.php');
        $this->assertStringContainsString('<button class="btn-lg btn-wave btn-theme">Login</button>', $html);
    }

    public function testHtmlContainsSignUpLink()
    {
        $html = file_get_contents('login.php');
        $this->assertStringContainsString('<a href="signup.php">Sign Up</a>', $html);
    }
}

