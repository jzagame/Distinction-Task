<!DOCTYPE html>
<html>
<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font-family: "Times New Roman", Georgia, Serif;
        }
        h1, h2, h3, h4, h5, h6 {
        font-family: "Playfair Display";
        letter-spacing: 5px;
        }
        #login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        form {
            width: 600px;
            border: 2px solid #ccc;
            padding: 30px;
            border-radius: 15px;
        }
        label {
            font-size: 18px;
        }
        input {
            display: block;
            border: 2px solid #ccc;
            width: 100%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        .center-button {
            display: flex;
            justify-content: center;
        }
        .error {
            background: #F1DEDE;
            color: #A84442;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
        }
        .login {
            padding-left: 3em;
        }
    </style>
</head>
<body>

    <?php

    include 'LoginProcess.php';
    include 'db_conn.php';

    $validate = new LoginProcess();
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $error_message = $validate->validateDetails($_POST['username'], $_POST['password']);

        if ($error_message == "Valid") {
            $username = $validate->trimData($_POST['username']);
            $password = $validate->trimData($_POST['password']);
            $password = md5($password);
            
            // Find username and password in the database
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['username'] === $username && $row['password'] === $pass) {
                    echo "Logged in!";
                }
            } else {
                $error_message = "Incorrect username or password";
            }
        }
    }

    ?>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <?php 
            include "menu.php";
        ?>
    </div>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
        <img class="w3-image" src="/w3images/hamburger.jpg" alt="Hamburger Catering" width="1600" height="800">
        <div class="w3-display-bottomleft w3-padding-large w3-opacity">
            <h1 class="w3-xxlarge">Le Catering</h1>
        </div>
    </header>
    
    <!-- Login Section -->
    <div class="w3-row w3-padding-64" id="login">
        <div class="w3-col l6 w3-padding-large">
            <form action="Login.php" method="post">
                <h1 class="w3-center">Login</h1><br>

                <!-- Error message -->
                <?php if (isset($error_message)) { ?>
                <p class="error"><?php echo $error_message ?></p>
                <?php } ?>
                <?php
                if (isset($error_message)) {
                    echo "<br>";
                }
                ?>
            
                <label><h4>Username</h4></label>
                <p class="w3-text-grey"><input type="text" name="username" placeholder="Username"></p><br>
                
                <labeL><h4>Password</h4></labeL>
                <p class="w3-text-grey"><input type="password" name="password" placeholder="Password"></p><br>
                
                <div class="center-button">
                    <button class="w3-button w3-light-grey w3-section" type="reset">Reset</button>
                    <div class="login">
                        <button class="w3-button w3-light-grey w3-section" type="submit">Login</button>
                    </div>
                </div>

                <div class="center-button">
                    <p><a href="register.php">Click here to register an account</a></p>
                </div>
            </form>
        </div>
            
        
    </div>

    <!-- End page content -->
    </div>

    <!-- Footer -->
    <footer class="w3-center w3-light-grey w3-padding-32">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>
</body>
</html>