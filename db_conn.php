<?php

$db_name = "users";

$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed");
}

$db_selected = mysqli_select_db($conn, 'dt_db');

if (!$db_selected) {
    $sql = 'CREATE DATABASE dt_db';

    if (mysqli_query($conn, $sql)) {
        echo "Database dt_db created successfully";
    } else {
        echo "Error creating database";
    }
}

?>