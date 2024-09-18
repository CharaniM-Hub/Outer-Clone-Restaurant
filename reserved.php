<?php
include('Connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Booking List</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Time</th>
        <th>room Type</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM booked_rooms";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $i = 1;
        while ($data = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['date']; ?></td>
            <td><?php echo $data['time']; ?></td>
            <td><?php echo $data['room_type']; ?></td>
            <td><?php echo $data['description']; ?></td>
          </tr>
      <?php
          $i++;
        }
      } else {
        echo "Error: " . mysqli_error($conn);
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
