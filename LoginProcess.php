<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

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

} else {
    header("Location: login.php");
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