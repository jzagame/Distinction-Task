<?php

use PHPUnit\Framework\TestCase;

class RegisterProcessTest extends TestCase {
    public function testValidateDetails() {
        $registerProcess = new RegisterProcess();
        $this->assertEquals("Valid", $registerProcess->validateDetails("vernon@email.com", "Vernon", "12345", "12345"));
        $this->assertEquals("Please enter a username", $registerProcess->validateDetails("vernon@email.com", "", "12345", "12345"));
        $this->assertEquals("Please enter a password", $registerProcess->validateDetails("vernon@email.com", "Vernon", "", ""));
        $this->assertEquals("Please enter your confirmed password", $registerProcess->validateDetails("vernon@email.com", "Vernon", "12345", ""));
        $this->assertEquals("Passwords do not match. Please try again", $registerProcess->validateDetails("vernon@email.com", "Vernon", "12345", "54321"));
    }

    public function testTrimData() {
        $registerProcess = new RegisterProcess();
        $this->assertEquals("Vernon", $registerProcess->trimData("  Vernon  "));
        $this->assertEquals("Vernon's", $registerProcess->trimData("Vern\on\'s"));
        $this->assertEquals("&lt;b&gt;Vernon&lt;/b&gt;", $registerProcess->trimData("<b>Vernon</b>"));
    }
}

?>