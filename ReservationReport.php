<?php
    session_start();
    error_reporting(0);
    include("database.php");
?>
<!DOCTYPE html>
<html>
<title>Reservation Report</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
        function back(){
			location = 'ReservationReport.php?';
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
        if($_POST['btnsearch'])
        {
            $count = 0;
			if($_POST['txtstartdate'] > $_POST['txtenddate'])
			{
				echo "<script>alert('Invalid Date');location='';</script>";
			}
			else
			{
				$SSQL = "SELECT * FROM tblReservation WHERE reserve_date >= '".$_POST['txtstartdate']."' AND reserve_date <= '".$_POST['txtenddate']."'";
				$SResult = mysqli_query($conn, $SSQL);
				if(mysqli_num_rows($SResult) > 0)
				{
	?>
					<div class="container" style="padding: 50px 0px 50px 0px;">
					<div class="container" style="background-color: white;padding: 20px 30px 20px 30px;	">
						<div class="form-group">
							<h2><center><strong>Reservation Report</strong></center></h2>
						</div>
						<hr class="bdr-light">
						<div class="container-fluid" style="padding: 20px 20px 20px 20px;border: thin solid #C1B6B6;width: 850px">
							<div id="appointment">
							<div style="padding-bottom: 20px;">
								<h3><center><strong>Reservation Report</strong></center></h3>
								<h4><center><strong>From <?php echo $_POST['txtstartdate']?> To <?php echo $_POST['txtenddate']?></strong></center></h4>
							</div>
							<table class="table table-striped">
								<thead>
									<tr bgcolor="black" style="color:white">
										<th align="right">No.</th>
										<th>Table No</th>
										<th>DATE</th>
										<th>Customer NAME</th>
										<th>Customer NRIC</th>
                                    	<th>Customer Contact</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody>
	<?php
									for($i=0;$i<mysqli_num_rows($SResult);++$i)
									{
										++$count;
										$row = mysqli_fetch_array($SResult);
	?>
										<tr>
											<td><?php echo $i+1?></td>
											<td><?php echo $row['table_no']?></td>
											<td><?php echo $row['reserve_date']?></td>
											<td><?php echo $row['cus_name']?></td>
											<td><?php echo $row['cus_nric']?></td>
											<td><?php echo $row['cus_contact']?></td>
											<td><?php echo $row['reserve_status']?></td>
										</tr>
	<?php
									}
	?>
										<tr>
											<td colspan="7">Total Reservation ==> <?php echo $count;?></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group" style="padding-top: 30px">
						<div class="col-sm-12" align="center">
							<input type="button" class="btn btn-default" name="btnBack" style="background-color: #333;color: white" value="Back" onClick="back()">
						</div>
				  	</div>
					</div>
					</div>
    <?php
        		}
			}
		}
        else
        {
    ?>
			<!-- Page content -->
			<div class="container" style="padding: 50px 0px 50px 0px;">
				<div class="container" style="padding: 20px 30px 20px 30px">
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<h3><center><strong>Select Date</strong></center></h3>
						</div>
						<hr class="bdr-light"> 
						<div class="form-group row">
							<label class="control-label col-sm-2"><span style="color: red"> * </span><strong>Start Date</strong></label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="txtstartdate" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-sm-2"><span style="color: red"> * </span><strong>End Date</strong></label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="txtenddate" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12" align="center">
								<input type="submit" class="btn btn-default" name="btnsearch" style="background-color: #333;color: white" value="Submit">
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