<?php 
    $localhost =  "localhost";
    $username = "username";
    $password = "password";
    $dbname = "dt_db";


    $conn = new mysqli($localhost,$username,$password,$dbname);

    if($conn ->connect_error){
        $conn = new mysqli($localhost,$username,$password);
        $conn -> query("Create Database dt_db");
        $conn = new mysqli($localhost,$username,$password,$dbname);
    }

    $table = array(
        "create table if not exists tblresmenu(
            menu_id int auto_increment primary key,
            menu_image_path varchar(1000),
            menu_name varchar(100),
            menu_price varchar(40),
            menu_ingredients varchar(100000),
            menu_description varchar(100000))"
    );

    foreach($table as $t){
        mysqli_query($conn,$t);
    }

    
?>