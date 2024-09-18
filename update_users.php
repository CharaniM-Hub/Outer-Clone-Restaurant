<?php
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $uname = $_POST['uname'];
    $upwd = $_POST['upwd'];
    $role = $_POST['role'];

    // Update user information in the database
    $sql = "UPDATE users SET uname = ?, upwd = ?, role = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $uname, $upwd, $role, $userId);

        if (mysqli_stmt_execute($stmt)) {
            echo 'User updated successfully. <a href="users_list.php">Go back to user list</a>';
        } else {
            echo "Error updating user: " . mysqli_stmt_error($stmt);
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
