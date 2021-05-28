<?php
    session_start();
    error_reporting(0);
    include("database.php");
    include("ReserveClass.php");
?>
<!DOCTYPE html>
<html>
<title>Reserve Table</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
        function reserve(x){
            location = 'ReserveTable.php?id='+x;
        }
        function back(){
            location = 'ReserveTable.php?';
        }
    </script>
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
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todaydate = date('Y-m-d');
    $reserveobj = new ReserveClass();
    if ($_POST['btnReserveTable']) {
            $CheckSQL = "SELECT * FROM tblReservation WHERE table_no = '" . trim($_POST['txtTableNo']) . "' 
            AND reserve_date = '" . strtoupper(trim($_POST['txtDate'])) . "' AND reserve_status = \"ACTIVE\"";
            $CheckResult = mysqli_query($conn, $CheckSQL);
        if (mysqli_num_rows($CheckResult) > 0) {
                echo "<script>alert('Reservation fail. Date already booked.');location='';</script>";
        } else {
                $iccheck = $reserveobj->validateIC($_POST['txtCusNRIC']);
                if ($iccheck == "Valid") {
                    $AddReserveSQL = "INSERT INTO tblReservation(cus_name, cus_nric, cus_contact, table_no, 
                        reserve_date, reserve_status)VALUES(
                        '" . strtoupper(trim($_POST['txtCusname'])) . "',
                        '" . strtoupper(trim($_POST['txtCusNRIC'])) . "',
                        '" . trim($_POST['txtCuscontact']) . "',
                        '" . strtoupper(trim($_POST['txtTableNo'])) . "',
                        '" . strtoupper(trim($_POST['txtDate'])) . "',
                        \"ACTIVE\"
                    )";
                    $AaddReservationResult = mysqli_query($conn, $AddReserveSQL);

                    if ($AaddReservationResult) {
                        echo "<script>alert('Reservation Added.');location='index.php';</script>";
                    } else {
                        echo "<script>alert('Add Failure');location='';</script>";
                    }
                } else {
                    echo "<script>alert('Invalid NRIC Format');location='';</script>";
                }
        }
    } elseif ($_GET['id'] != "") {
        ?>
            <div class="container" style="padding: 50px 0px 50px 0px;">
            <div class="container" style="padding: 20px 30px 20px 30px">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <h3><center><strong>Reserve Table</strong></center></h3>
                    </div>
                    <hr class="bdr-light"> 
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Table No</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtTableNo" required 
                            id="tableno" readonly value="<?php echo $_GET['id']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer Name</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Name" name="txtCusname" 
                            required id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer NRIC:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter NRIC" name="txtCusNRIC" 
                            required id="ic">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer Contact:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Contact" name="txtCuscontact" 
                            required id="contact">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Date:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="Enter Date" name="txtDate" 
                            required id="date" min="<?php echo $todaydate;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" align="center">
                            <input type="submit" class="btn btn-default" name="btnReserveTable" 
                            style="background-color: #333;color: white" value="Submit">
                            <input type="button" class="btn btn-default" name="btnBack"
                            style="background-color: #333;color: white" value="Return" onClick="back()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    } else {
            $SearchTablSQL = "SELECT * FROM tblTable";
            $SearchResult = mysqli_query($conn, $SearchTablSQL);
        if (mysqli_num_rows($SearchResult) > 0) {
            ?>
    <!-- Page content -->
    <div class="container" style="padding: 50px 0px 50px 0px;">
        <div class="container" style="padding: 20px 30px 20px 30px">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <h3><center><strong>Table List</strong></center></h3>
                    <span style="color: red"><center>Click on the row of the table to make reservation</center></span>
                </div>
                <hr class="bdr-light">
                <table class="table table-hover">
                                <thead>
                                <tr bgcolor="black" style="color:white">
                                    <th>
                                        NO.
                                    </th>
                                    <th>
                                        Table No
                                    </th>
                                    <th>
                                        Table Seat
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                </tr>
                                </thead>
                            <?php
                            for ($i = 0; $i < mysqli_num_rows($SearchResult); ++$i) {
                                    $row = mysqli_fetch_array($SearchResult);
                                ?>
                                <tbody>
                                    <tr onClick="reserve('<?php echo $row['table_no'];?>')">
                                    <td>
                                        <?php echo $i + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['table_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['table_seat']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['table_description']; ?>
                                    </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                            </table>
            </form>
        </div>
    </div>
            <?php
        } else {
                echo "<script>alert('No Table Found');location='index.php';</script>";
        }
    }
    ?>
    <!-- Footer -->
    <footer class="w3-center w3-light-grey w3-padding-32 footer">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS"
    target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>

</body>
<script>
$('#name').keyup( function () {
        while (!/^(([A-Za-z ]+)((.|,)([A-Za-z ]))?)?$/.test( $('#name').val())) {
            $('#name').val( $('#name').val().slice(0, -1));
        }
    });
$('#contact').keyup( function () {
        while (!/^(([0-9]+)((.|,)([0-9]))?)?$/.test( $('#contact').val())) {
            $('#contact').val( $('#contact').val().slice(0, -1));
        }
    });

</script>
</html>
