<?php 
session_start();
include('Connection.php');

if(isset($_POST['submit']))
{
    $username = $_POST['uname'];
    $password = $_POST['upwd'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE uname='$username' AND upwd='$password' AND role='$role'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if(!empty($data))
    {
        $_SESSION['user_role'] = $data['role'];
        $_SESSION['username'] = $data['uname'];

        // Redirect based on user role
        if ($role === 'Admin') {
            header('location: admin_dashboard.php');
        } elseif ($role === 'Staff') {
            header('location: confirm.php');
        } elseif ($role === 'Customer') {
            // Redirect to another page for customers if needed
            header('location: Home.php');
        }
    }
    // Add an else block to handle invalid login credentials or redirect to an error page
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
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

<br>
  <h1>Login form</h1>
  <form method="post">
    <div class="mb-3 mt-3">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="uname">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upwd">
    </div>
    <div class="mb-3">
      <label for="pwd">Role:</label>
      <select class="form-control" name="role">
	  <option>Select Role</option>
    <option value="Admin">Admin</option>
	  <option value="Staff">Outer Clove Staff</option>
	  <option value="Customer">Customer</option>
	  </select>
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
