<?php
session_start();
include 'db.php';

$msg = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // match MD5 encrypted password

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $msg = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body {
      font-family: sans-serif;
      background: 
        linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url('images/background.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
    }
    .login-box {
      width: 300px;
      margin: 100px auto;
      padding: 20px;
      background: rgba(255,255,255,0.95);
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
    }
    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
      <?php if ($msg != '') echo "<p class='error'>$msg</p>"; ?>
    </form>
  </div>
</body>
</html>
