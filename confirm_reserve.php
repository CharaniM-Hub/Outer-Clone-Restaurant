<?php
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $reservationId = $_GET['id'];

    // Assuming you have a 'status' column in your booked_rooms table
    $confirmStatus = 'confirmed';

    $updateQuery = "UPDATE booked_rooms SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $confirmStatus, $reservationId);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: confirm_reserve.php?status=success");
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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirm Reservations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Confirm Reservations</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM booked_rooms";
                $result = mysqli_query($conn, $sql);

                $i = 1;
                while ($reservation = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $reservation['name']; ?></td>
                        <td><?php echo $reservation['email']; ?></td>
                        <td><?php echo $reservation['date']; ?></td>
                        <td><?php echo $reservation['time']; ?></td>
                        <td><?php echo $reservation['roomtype']; ?></td>
                        <td><?php echo $reservation['description']; ?></td>
                        <td><?php echo $reservation['status']; ?></td>
                        <td>
                            <?php if ($reservation['status'] !== 'confirmed') : ?>
                                <!-- Confirm Button -->
                                <a href="confirm_reserve_logic.php?id=<?php echo $reservation['id']; ?>" class="btn btn-success btn-sm">Confirm</a>
                            <?php endif; ?>

                            <!-- Edit Button -->
                            <a href="edit_reserve.php?id=<?php echo $reservation['id']; ?>" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete Button -->
                            <a href="delete_reserve.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php $i++;
                } ?>

            </tbody>
        </table>
    </div>

</body>

</html>
