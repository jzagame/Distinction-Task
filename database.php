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
            menu_description varchar(100000))",
        "create table if not exists tblTable(
            table_id int auto_increment primary key,
            table_no varchar(10),
            table_seat int,
            table_description varchar(500))",
        "create table if not exists tblReservation(
            reserve_id int auto_increment primary key,
            cus_name varchar(50),
            cus_nric varchar(50),
            cus_contact varchar(20),
            table_no varchar(10),
            reserve_date DATE,
            reserve_status VARCHAR(10))",
        "create table if not exists tblorder(
            order_id int auto_increment primary key,
            cust_name varchar(40),
            cust_ic varchar(20),
            cust_address varchar(100),
            cust_phone varchar(20))",
        "CREATE TABLE if not exists users (
            ID int (11) AUTO_INCREMENT,
            email varchar(255) NOT NULL,
            username varchar(255) NOT NULL,
            password varchar(255) NOT NULL,
            PRIMARY KEY (ID)
            )"
    );

    foreach($table as $t){
        mysqli_query($conn,$t);
    }

    $SQL = "SELECT * FROM users WHERE username = 'admin' AND password = '" . trim('abc123') . "'";
    $result = mysqli_query($conn, $SQL);
    if (mysqli_num_rows($result) > 0) {

    } else {
        $AddSQL = "INSERT INTO users(email, username, password) VALUES('admin', 'admin', '" . trim('abc123') . "')";
        $AddResult = mysqli_query($conn, $AddSQL);
    }
    
?>