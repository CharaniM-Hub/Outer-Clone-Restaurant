<?php
include('Connection.php');

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details for the given ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($data = mysqli_fetch_assoc($result)) {
            // Render the edit form with existing data
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Edit User</title>
                <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>

            <div class="container mt-3">
                <h2>Edit User</h2>

                <form method="post" action="update_users.php">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <div class="mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="uname" value="<?php echo $data['uname']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="upwd" value="<?php echo $data['upwd']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="role">Role:</label>
                        <input type="text" class="form-control" id="role" name="role" value="<?php echo $data['role']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>

            </body>
            </html>
<?php
        } else {
            echo "User not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
