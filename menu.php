<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    .login {
        text-decoration: none;
        color: white;
    }

    .login:hover {
        color: white;
    }
</style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
    <a class="navbar-brand" href="index.php">Logo</a>

  <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop3" data-toggle="dropdown">
                Restaurant Menu
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="AddRestaurantMenu.php">Add Menu</a>
                <a class="dropdown-item" href="#">Edit & View</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop3" data-toggle="dropdown">
                Reserve Table
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="AddTable.php">Add Table</a>
                <a class="dropdown-item" href="ReserveTable.php">Reserve Table</a>
                <a class="dropdown-item" href="EditReservation.php">Edit/Cancel Reservation</a>
            </div>
        </li>

    <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop3" data-toggle="dropdown">
                Report
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="ReservationReport.php">Reservation Report</a>
            </div>
        </li>
    </ul>
    <div class="right-side">
        <a href="login.php" class="login">Login</a>
    </div>
</nav>
