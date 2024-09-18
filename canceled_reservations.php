<?php
include('Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Canceled Reservations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Canceled Reservations</h2>

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

                $sql = "SELECT * FROM booked_rooms WHERE status = 'canceled'";
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
