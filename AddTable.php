<?php
    session_start();
    error_reporting(0);
    include("database.php");
?>
<!DOCTYPE html>
<html>
<title>Add Table</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    label {
            font-size: 17px;
            text-align:right;
            padding-top:5px;
        }
        .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        }
</style>
<body>
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


    <?php
        if($_POST['btnAddtable'])
        {
            $CheckTableSQL = "SELECT * FROM tblTable WHERE table_no = '".strtoupper(trim($_POST['txtTableno']))."'";
            $CheckTableResult = mysqli_query($conn, $CheckTableSQL);
            if(mysqli_num_rows($CheckTableResult) > 0)
			{
                echo "<script>alert('Table NO. Exists');location='';</script>";
            }
            else
            {
                $AddTableSQL = "INSERT INTO tblTable(table_no, table_seat, table_description)VALUES(
                    '". strtoupper(trim($_POST['txtTableno']))."',
                    '". trim($_POST['txtTableseat'])."',
                    '". strtoupper(trim($_POST['txtDescription']))."'
                )";
                $AaddTableResult = mysqli_query($conn, $AddTableSQL);
    
                if($AaddTableResult)
                {
                    echo "<script>alert('Table Added.');location='AddTable.php';</script>";
                }
                else
                {
                    echo "<script>alert('Add Failure');location='AddTable.php';</script>";
                }
            }
        }
        else
        {
    ?>
    <!-- Page content -->
    <div class="container" style="padding: 50px 0px 50px 0px;">
        <div class="container" style="padding: 20px 30px 20px 30px">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <h3><center><strong>Add Table</strong></center></h3>
                </div>
                <hr class="bdr-light"> 
                <div class="form-group row">
                    <label class="control-label col-sm-2"><span style="color: red"> * </span><strong>Table No:</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter Table No" name="txtTableno" required id="tableno">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2"><span style="color: red"> * </span><strong>Seat:</strong></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Enter Table Seat" name="txtTableseat" required id="tableseat" min="0" step="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2"><strong>Description:</strong></label>
                    <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Enter Description" name="txtDescription" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" align="center">
                        <input type="submit" class="btn btn-default" name="btnAddtable" style="background-color: #333;color: white" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- Footer -->
    <footer class="w3-center w3-light-grey w3-padding-32 footer">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>

</body>
</html>
