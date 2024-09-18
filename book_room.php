<?php
include('Connection1.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a 'room_type' field in the form
    $roomType = $_POST['room_type'];

    // Perform booking logic here, similar to the reservation form logic
    // You can insert the booking details into a different table or adjust the existing one

    $sql = "INSERT INTO reservations (room_type) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $roomType);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Room booked successfully!';
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
