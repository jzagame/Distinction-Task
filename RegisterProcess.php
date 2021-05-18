<?php
if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Check if any fields are empty
    if (empty($email)) {
        header("Location: register.php?error=Please enter an email");
        exit();
    } else if (empty($username)) {
        header("Location: register.php?error=Please enter a username");
        exit();
    } else if (empty($password)) {
        header("Location: register.php?error=Please enter a password");
        exit();
    } else if ($password != $confirm_password) {
        header("Location: register.php?error=Passwords do not match");
        exit();
    } else {
        echo "Valid";
    }

} else {
    header("Location: register.php");
    exit();
}

// Removes spaces, slashes, and special characters
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>