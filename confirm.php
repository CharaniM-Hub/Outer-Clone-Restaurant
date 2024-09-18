<?php
include('Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirm Reservations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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

                $sql = "SELECT * FROM reservations";
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
                                <a href="confirm_reservation_logic.php?id=<?php echo $reservation['id']; ?>" class="btn btn-success btn-sm">Confirm</a>
                            <?php endif; ?>

                            <!-- Edit Button -->
                            <a href="edit_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete Button -->
                            <a href="delete_reservation.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php $i++;
                } ?>

            </tbody>
        </table>
    </div>

</body>

</html>
