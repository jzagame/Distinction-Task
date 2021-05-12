<?php 
    session_start();
    include "../database.php";
    if($_POST['restaurant-submit'] == "restaurant-submit"){
        $check = false;
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["menu_image"]["name"];
        $saved_image_path = "../MenuPicture/".basename($filename);
        $filetype = $_FILES["menu_image"]["type"];
        $_SESSION['m']['mn'] = $_POST['menu-name'];
        $_SESSION['m']['mp'] = $_POST['menu-price'];
        $_SESSION['m']['md'] = $_POST['menu-description'];
        $_SESSION['m']['mi'] = $_POST['menu-ingredients'];
        //verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            echo "<script>window.alert(' Please select a valid file format.')</script>";
        }
        //verify file type
        if(in_array($filetype,$allowed)){
            if(file_exists("../MenuPicture/" . $filename)){
                echo "<script>window.alert('Name duplicated! Please rename your picture file')</script>";
            }else{
                $check = true;
            }
        }
        if($check == true){
            $sql = "insert into tblresmenu(menu_image_path,menu_name,menu_price,menu_description,menu_ingredients) values
            ('".$saved_image_path."','".$_POST['menu-name']."','".$_POST['menu-price']."','".$_POST['menu-description']."','".$_POST['menu-ingredients']."')";
            if(mysqli_query($conn,$sql) == true){
                move_uploaded_file($_FILES["menu_image"]["tmp_name"], $saved_image_path);
                echo "<script>window.alert('New Menu Create Successfully!')</script>";
                unset($_SESSION['m']);
            }   
        }
        // header("Location: http://localhost/Distinction-Task/AddRestaurantMenu.php");
        echo "<script> document.location = '../AddRestaurantMenu.php'; </script>";
    }
?>