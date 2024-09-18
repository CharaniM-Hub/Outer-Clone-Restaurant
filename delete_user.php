<?php
include('Connection.php');

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete user with the given ID
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);

        if(mysqli_stmt_execute($stmt)) {
            echo "User deleted successfully.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
