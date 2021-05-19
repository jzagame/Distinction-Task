<?php

class LoginProcess {
    public function validateDetails($username, $password) {
        // Check if any fields are empty
        if (empty($username)) {
            return "Please enter a username";
        } else if (empty($password)) {
            return "Please enter a password";
        } else {
            //echo "Valid";
            return "Valid";
        }
    }

    // Removes spaces, slashes, and special characters
    public function trimData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}

?>