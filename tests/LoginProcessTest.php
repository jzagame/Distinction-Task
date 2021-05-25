<?php

use PHPUnit\Framework\TestCase;

class LoginProcessTest extends TestCase {
    public function testValidateDetails() {
        $loginProcess = new LoginProcess();
        $this->assertEquals("Valid", $loginProcess->validateDetails("Vernon", "12345"));
        $this->assertEquals("Please enter a username", $loginProcess->validateDetails("", "12345"));
        $this->assertEquals("Please enter a password", $loginProcess->validateDetails("Vernon", ""));
    }

    public function testTrimData() {
        $loginProcess = new LoginProcess();
        $this->assertEquals("Vernon", $loginProcess->trimData("  Vernon  "));
        $this->assertEquals("Vernon's", $loginProcess->trimData("Vern\on\'s"));
        $this->assertEquals("&lt;b&gt;Vernon&lt;/b&gt;", $loginProcess->trimData("<b>Vernon</b>"));
    }
}

?>