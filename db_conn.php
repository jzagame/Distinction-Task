<?php

$db_name = "users_db";

$conn = mysqli_connect("localhost", "root", "", $db_name);

if (!$conn) {
    echo "Connection failed";
}


?>