<?php

class RegisterProcess {
    public function validateDetails($username, $password, $confirm_password) {
        // Check if any fields are empty
        if (empty($username)) {
            return "Please enter a username";
        } else if (empty($password)) {
            return "Please enter a password";
        } else if (empty($confirm_password)) {
            return "Please enter your confirmed password";
        } else if ($password != $confirm_password) {
            return "Paswords do not match. Please try again";
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

if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Check if any fields are empty
    if (empty($email)) {
        header("Location: Register.php?error=Please enter an email");
        exit();
    } else if (empty($username)) {
        header("Location: Register.php?error=Please enter a username");
        exit();
    } else if (empty($password)) {
        header("Location: Register.php?error=Please enter a password");
        exit();
    } else if ($password != $confirm_password) {
        header("Location: Register.php?error=Passwords do not match");
        exit();
    } else {
        echo "Valid";
    }

} else {
    header("Location: Register.php");
    exit();
}
?>