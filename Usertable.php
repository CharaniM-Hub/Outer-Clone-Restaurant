<?php
include('Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users List</title>
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Users List</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "select * from users";
                $result = mysqli_query($conn, $sql);

                $i = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['uname']; ?></td>
                        <td><?php echo $data['upwd']; ?></td>
                        <td><?php echo $data['role']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="edit_user.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <!-- Delete Button -->
                            <a href="delete_user.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php $i++;
                } ?>

            </tbody>
        </table>
    </div>

</body>

</html>
