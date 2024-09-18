<?php
// Include the database connection file
include('Connection1.php');

if (isset($_POST['reserve'])) {
    // Assuming you have form fields like name, email, phone, etc. in your reservation form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $roomtype = $_POST['roomtype'];
    $description = $_POST['description'];

    // SQL query to insert data into the reserved_rooms table
    $sql = "INSERT INTO booked_rooms (name, email, phone, date, time, roomtype, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Use "sssssss" because you have seven parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $phone, $date, $time, $roomtype, $description);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Reservation successful! Thank you!';
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
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Room Reservation Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./GlobalStyles.css">
  <link rel="stylesheet" href="./Components.css">
  <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container {
    max-width: 400px;
    background-color: #fff;
    padding: 80px;
    border-radius: 50px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.2);
}

h2 {
    text-align: center;
    color: #007bff;
    font-size: 24px; 
    margin-bottom: 20px; 
}

label {
    color:#fff;
}

input.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

button.btn-primary {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

.form-control{
    width: 240px;
    height: 2rem;
}


    </style>
</head>
<body>


<div class="container mt-3">

<!-- Reservation Form-->
<div class="container1 mt-3">
            <h1>Book Your Room & Spend your time</h1>
            <form method="post">

                <div class="mb-3 mt-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>

                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                </div>

                <div class="mb-3">
                    <label for="time">Time:</label>
                    <input type="time" class="form-control" id="time" placeholder="Enter time" name="time">
                </div>

                <div class="mb-3">
                    <label for="roomtype">Room Type:</label>
                    <input type="roomtype" class="form-control" id="roomtype" placeholder="Enter Room Type" name="roomtype">
                </div>
                
                <div class="mb-3">
                    <label for="description">description:</label>
                    <input type="description" class="form-control" id="description" placeholder="Enter the Special Note" name="description">
                </div>

                <br>
                <button type="reserve" name="reserve" class="btn btn-primary">Reserve</button>
            </form>
        </div>
    </div>

<!--End Reservation Form-->
</body>
</html>
