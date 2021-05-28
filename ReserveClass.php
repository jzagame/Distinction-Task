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

    // Removes spaces, slashes, and special characters
    // public function trimData($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);

    //     return $data;
    // }
}

?>