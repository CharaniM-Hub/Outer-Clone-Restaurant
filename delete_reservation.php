<?php
include('Connection.php');

// Check if the reservation ID is provided in the URL
if (isset($_GET['id'])) {
    $reservationId = $_GET['id'];

    // Fetch reservation details based on the ID
    $sql = "SELECT * FROM reservations WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $reservationId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result && $reservation = mysqli_fetch_assoc($result)) {
            // Reservation details are fetched, you can use them in the confirmation message
        } else {
            echo "Error fetching reservation details: " . mysqli_error($conn);
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "Reservation ID not provided.";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform deletion of the reservation
    $deleteSql = "DELETE FROM reservations WHERE id = ?";
    $deleteStmt = mysqli_prepare($conn, $deleteSql);

    if ($deleteStmt) {
        mysqli_stmt_bind_param($deleteStmt, "i", $reservationId);
        
        if (mysqli_stmt_execute($deleteStmt)) {
            echo 'Reservation deleted successfully!';
            exit();
        } else {
            echo "Error deleting reservation: " . mysqli_error($conn);
        }

        mysqli_stmt_close($deleteStmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <title>Delete Reservation</title>
    <style>
        /* Add your styles directly here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #ff0000;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .cancel-link {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Delete Reservation</h2>
    <p>Are you sure you want to delete the reservation for <?php echo $reservation['name']; ?>?</p>
    
    <form method="post">
        <button type="submit" name="submit">Delete</button>
        <a href="confirm.php" class="cancel-link">Cancel</a>
    </form>
</body>

</html>
