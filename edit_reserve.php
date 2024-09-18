<?php
include('Connection1.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $roomtype = $_POST['roomtype'];
    $description = $_POST['description'];

    $updateQuery = "UPDATE reservations SET name=?, email=?, phone=?, date=?, time=?, roomtype=?, description=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $email, $phone, $date, $time, $roomtype, $description, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Reservation updated successfully!';
        } else {
            echo "Error updating reservation: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch the existing reservation details
if (isset($_GET['id'])) {
    $reservationId = $_GET['id'];
    $selectQuery = "SELECT * FROM booked_rooms WHERE id=?";
    $stmt = mysqli_prepare($conn, $selectQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $reservationId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $date = $row['date'];
            $time = $row['time'];
            $roomtype = $row['roomtype'];
            $description = $row['description'];
        } else {
            echo 'Reservation not found.';
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    echo 'Reservation ID not provided.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="edit_reservation.css">
</head>
<body>

<div class="content">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Edit Reservation</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="mb-3">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
        </div>

        <div class="mb-3">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
        </div>

        <div class="mb-3">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" value="<?php echo $time; ?>">
        </div>

        <div class="mb-3">
            <label for="roomtype">Room Type:</label>
            <input type="text" class="form-control" id="roomtype" name="roomtype" value="<?php echo $roomtype; ?>">
        </div>

        <div class="mb-3">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>

</body>
</html>
