<?php
include 'db.php';
session_start();

$msg = '';

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "Email already registered!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $msg = "Registration successful! You can login now.";
        } else {
            $msg = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Registration - PG Finder</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('images/background.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .register-container {
      max-width: 450px;
      margin: 80px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      color: #007BFF;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #28a745;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #218838;
    }

    .msg {
      text-align: center;
      color: red;
      margin-top: 10px;
    }

    .back-home {
      text-align: center;
      margin-top: 20px;
    }

    .back-home a {
      color: #007BFF;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="register-container">
  <h2>User Registration</h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Create Password" required>
    <button type="submit" name="register">Register</button>
    <?php if ($msg != '') echo "<p class='msg'>$msg</p>"; ?>
  </form>
  <div class="back-home">
    <a href="index.html">← Back to Home</a> | <a href="user_login.php">Already have an account? Login</a>
  </div>
</div>

</body>
</html>
