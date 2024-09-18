<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">  
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<!-- Navigation Bar -->
<nav>
    <div class="logo"><h1> Admin Dashboard</h1></div>
    <ul>
        <li><a href="admin_dashboard.php?page=booking">Show Booking Details</a></li>
        <li><a href="admin_dashboard.php?page=confirm">Confirm Table Reservation</a></li>
        <li><a href="admin_dashboard.php?page=confirm">Confirm Room Reservation</a></li>
        <li><a href="admin_dashboard.php?page=cancel">Cancel Reservation</a></li>
        <li><a href="admin_dashboard.php?page=users_list">Show User Details</a></li>
        <li><a href="admin_dashboard.php?page=usertable">User Table</a></li>
    </ul>
</nav>


<!-- Main Content -->
<div class="content">
    <!-- Content will be loaded dynamically based on navigation links -->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        include("$page.php");
    }
    ?>
</div>

</body>
</html>
