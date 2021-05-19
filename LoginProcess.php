<?php

class LoginProcess {
    public function validateDetails($username, $password) {
        // Check if any fields are empty
        if (empty($username)) {
            header("Location: login.php?error=Please enter a username");
            exit();
        } else if (empty($password)) {
            header("Location: login.php?error=Please enter a password");
            exit();
        } else {
            echo "Valid";
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

$validate = new LoginProcess();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $validate->trimData($_POST['username']);
    $password = $validate->trimData($_POST['password']);
    $validate->validateDetails($username, $password);
} else {
    header("Location: Login.php");
    exit();
}

?>