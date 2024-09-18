<?php
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $reservationId = $_GET['id'];

    // Assuming you have a 'status' column in your reservations table
    $confirmStatus = 'confirmed';

    $updateQuery = "UPDATE reservations SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $confirmStatus, $reservationId);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: confirm.php?status=success");
            exit();
        } else {
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
