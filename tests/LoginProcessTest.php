<?php

use PHPUnit\Framework\TestCase;

class LoginProcessTest extends TestCase {
    public function testValidateDetails() {
        $loginProcess = new LoginProcess();
        $this->assertEquals("Valid", $loginProcess->validateDetails("Vernon", "12345"));
    }
}

?>