<?php

use PHPUnit\Framework\TestCase;

class ReserveTest extends TestCase {
    public function testvalidateIC() {
        $reserve = new ReserveClass();
        $this->assertEquals("Valid", $reserve->validateIC("112233-44-5566"));
        $this->assertEquals("Invalid", $reserve->validateIC("11223-344-5566"));
        $this->assertEquals("Invalid", $reserve->validateIC("112233 44 5566"));
        $this->assertEquals("Invalid", $reserve->validateIC("11-233-44-5566"));
        $this->assertEquals("Invalid", $reserve->validateIC("112233-a4-5566"));
    }

    // public function testTrimData() {
    //     $loginProcess = new LoginProcess();
    //     $this->assertEquals("Vernon", $loginProcess->trimData("  Vernon  "));
    //     $this->assertEquals("Vernon's", $loginProcess->trimData("Vern\on\'s"));
    //     $this->assertEquals("&lt;b&gt;Vernon&lt;/b&gt;", $loginProcess->trimData("<b>Vernon</b>"));
    // }
}

?>