<?php
    session_start();
    error_reporting(0);
    include("database.php");
?>
<!DOCTYPE html>
<html>
<title>Reserve Table</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
        function reserve(x){
            location = 'EditReservation.php?id='+x;
        }
        function back(){
            location = 'EditReservation.php?';
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
    if ($_POST['btnEditReservation']) {
            $CheckSQL = "SELECT * FROM tblReservation WHERE table_no = '" . trim($_POST['txtTable']) . "' 
            AND reserve_date = '" . strtoupper(trim($_POST['txtDate'])) . "' AND reserve_status = \"ACTIVE\"";
            $CheckResult = mysqli_query($conn, $CheckSQL);
        if (mysqli_num_rows($CheckResult) > 0) {
                echo "<script>alert('Reservation fail. Date already booked.');location='';</script>";
        } else {
                $EditRSQL = "UPDATE tblReservation SET
                cus_name = '" . strtoupper(trim($_POST['txtCusname'])) . "',
                cus_nric = '" . trim($_POST['txtCusNRIC']) . "',
                cus_contact = '" . trim($_POST['txtCuscontact']) . "',
                table_no = '" . $_POST['txtTable'] . "',
                reserve_date = '" . strtoupper(trim($_POST['txtDate'])) . "'
                WHERE reserve_id = '" . $_POST['txtReserveID'] . "'
                ";
                $EditResult = mysqli_query($conn, $EditRSQL);
            if ($EditResult) {
                    echo "<script>alert('Edit Reservation Successfully');location='EditReservation.php';</script>";
            } else {
                    echo "<script>alert('Edit Failure');location='';</script>";
            }
        }
    } elseif ($_POST['btnCancel']) {
            $CancelSQL = "UPDATE tblReservation SET reserve_status = \"CANCEL\" WHERE 
            reserve_id = '" . $_POST['txtReserveID'] . "'";
            $CancelResult = mysqli_query($conn, $CancelSQL);
        if ($CancelResult) {
                echo "<script>alert('Reservation Cancelled');location='EditReservation.php';</script>";
        } else {
                echo "<script>alert('Cancel Failure');location='';</script>";
        }
    } elseif ($_GET['id'] != "") {
            $tempSQL = "SELECT * FROM tblReservation WHERE reserve_id = '" . $_GET['id'] . "'";
            $tempResult = mysqli_query($conn, $tempSQL);
            $temprow = mysqli_fetch_array($tempResult);
        ?>
            <div class="container" style="padding: 50px 0px 50px 0px;">
            <div class="container" style="padding: 20px 30px 20px 30px">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <h3><center><strong>Edit Reservation</strong></center></h3>
                    </div>
                    <hr class="bdr-light">
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Reserve ID:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="txtReserveID" required 
                            id="reserveid" value="<?php echo $temprow['reserve_id']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Table No</strong>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="txtTable">
                                <?php
                                    $TableSQL = "SELECT * FROM tblTable";
                                    $TableResult = mysqli_query($conn, $TableSQL);
                                if (mysqli_num_rows($TableResult) > 0) {
                                    for ($i = 0; $i < mysqli_num_rows($TableResult); ++$i) {
                                            $TableRow = mysqli_fetch_array($TableResult);
                                        ?>
                                            <option value="<?php echo $TableRow['table_no']?>" 
                                            <?php echo ($TableRow['table_no'] ==
                                            $temprow['table_no']) ?  "selected" : "" ;  ?>>
                                            <?php echo "Table NO= " . $TableRow['table_no'] . "   " . "Seat= " .
                                            $TableRow['table_seat'] . "   Description= " .
                                            $TableRow['table_description'];?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer Name</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Name" name="txtCusname" 
                            required id="name" value="<?php echo $temprow['cus_name']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer NRIC:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter NRIC" name="txtCusNRIC" 
                            required id="nric" value="<?php echo $temprow['cus_nric']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Customer Contact:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Contact" name="txtCuscontact" 
                            required id="contact" value="<?php echo $temprow['cus_contact']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3">
                            <span style="color: red"> * </span>
                            <strong>Date:</strong>
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="Enter Date" name="txtDate" required 
                            id="date" min="<?php echo $todaydate;?>" value="<?php echo $temprow['reserve_date']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" align="center">
                            <input type="submit" class="btn btn-default" name="btnEditReservation" 
                            style="background-color: #333;color: white" value="Edit Reservation">
                            <input type="submit" class="btn btn-default" name="btnCancel" 
                            style="background-color: #333;color: white" value="Cancel Reservation">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    } elseif ($_POST['btnSearch']) {
            $SearchR = "SELECT * FROM tblReservation WHERE cus_nric = '" . trim($_POST['txtNRIC']) . "' 
            AND reserve_status = \"ACTIVE\"";
            $ResultSearchR = mysqli_query($conn, $SearchR);
        if (mysqli_num_rows($ResultSearchR) > 0) {
            ?>
                <div class="container" style="padding: 50px 0px 50px 0px;">
                <div class="container" style="padding: 20px 30px 20px 30px">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <h3><center><strong>Reservation List</strong></center></h3>
                            <span style="color: red"><center>Click on the row of reservation to edit</center></span>
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
                                                Date
                                            </th>
                                        </tr>
                                        </thead>
                                    <?php
                                    for ($i = 0; $i < mysqli_num_rows($ResultSearchR); ++$i) {
                                            $row = mysqli_fetch_array($ResultSearchR);
                                        ?>
                                            <tbody>
                                                <tr onClick="reserve('<?php echo $row['reserve_id'];?>')">
                                                    <td>
                                                        <?php echo $i + 1; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['table_no']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['reserve_date']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                    <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <input type="button" class="btn btn-default" name="btnBack" 
                                        style="background-color: #333;color: white" value="Return" onClick="back()">
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
            <?php
        } else {
                echo "<script>alert('No Reservation Record Found');location='';</script>";
        }
    } else {
        ?>
    <!-- Page content -->
    <div class="container" style="padding: 50px 0px 50px 0px;">
        <div class="container" style="padding: 20px 30px 20px 30px">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <h3><center><strong>Search Reservation</strong></center></h3>
                </div>
                <hr class="bdr-light">
                <div class="form-group row">
                    <label class="control-label col-sm-3">
                        <span style="color: red"> * </span>
                        <strong>NRIC</strong>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="txtNRIC" required id="ic">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" align="center">
                        <input type="submit" class="btn btn-default" name="btnSearch" 
                        style="background-color: #333;color: white" value="Submit">
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
