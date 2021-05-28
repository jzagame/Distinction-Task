<?php

class ReserveClass {
    public function validateIC($nric) {
        $regex = '/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/';
        if (preg_match($regex, $nric)) {
            return "Valid";
        } else {
            return "Invalid";
        }
    }

    public function validateContact($contact) {
        $regex = '/^[0]{1}[1]{1}[0-9]{1}-[0-9]{7}$/';
        if (preg_match($regex, $contact)) {
            return "Valid";
        } else {
            return "Invalid";
        }
    }

    public function validateDate($startdate, $enddate) {
        if ($startdate > $enddate) {
            return "Invalid";
        } else {
            return "Valid";
        }
    }
}

?>