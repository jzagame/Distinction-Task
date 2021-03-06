<?php

class RegisterProcess {
    public function validateDetails($email, $username, $password, $confirm_password) {
        // Check if any fields are empty
        if (empty($email)) {
            return "Please enter your email address";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // Email validation
            return "Invalid email address. Please try again";
        } else if (empty($username)) {
            return "Please enter a username";
        } else if (strlen($username) < 5) {
            return "Username is too short. Please try again";
        } else if (empty($password)) {
            return "Please enter a password";
        } else if (strlen($password) < 5) {
            return "Password is too short. Please try again.";
        } else if (empty($confirm_password)) {
            return "Please enter your confirmed password";
        } else if ($password != $confirm_password) {
            return "Passwords do not match. Please try again";
        } else {
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