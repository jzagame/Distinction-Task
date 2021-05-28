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

    public function testvalidateContact() {
        $reserve = new ReserveClass();
        $this->assertEquals("Valid", $reserve->validateContact("010-2228627"));
        $this->assertEquals("Invalid", $reserve->validateContact("010 2228627"));
        $this->assertEquals("Invalid", $reserve->validateContact("0102-228627"));
        $this->assertEquals("Invalid", $reserve->validateContact("012-222-8677"));
    }

    public function testvalidateDate() {
        $reserve = new ReserveClass();
        $this->assertEquals("Valid", $reserve->validateDate("23/05/2021" , "24/05/2021"));
        $this->assertEquals("Invalid", $reserve->validateDate("23/05/2021", "21/04/2021"));
    }
}

?>