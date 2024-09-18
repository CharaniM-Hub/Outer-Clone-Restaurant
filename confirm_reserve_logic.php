<?php
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $reservationId = $_GET['id'];
    $confirmStatus = 'confirmed';

    // Prepare and execute the update query
    $updateQuery = "UPDATE booked_rooms SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $confirmStatus, $reservationId);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: confirm_reserve.php?status=success");
            exit();
        } else {
            // Display an error message
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Display an invalid request message
    echo "Invalid request.";
}
?>
