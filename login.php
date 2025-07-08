<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['name'] = $row['name'];
      $_SESSION['role'] = $row['role'];

      if ($row['role'] == 'admin') {
        header("Location: admin_dashboard.php");
      } else {
        header("Location: user_dashboard.php");
      }
      exit();
    } else {
      echo "<script>alert('Invalid Password'); window.location='login.php';</script>";
    }
  } else {
    echo "<script>alert('No user found with this email'); window.location='login.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Village Tour</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #e0f2f1;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 450px;
      margin: 60px auto;
      background: white;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      border-radius: 10px;
      position: relative;
    }

    h2 {
      text-align: center;
      color: #004d40;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      background: #00695c;
      color: white;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background: #004d40;
    }

    .home-icon {
      position: absolute;
      top: 15px;
      right: 20px;
      background: #004d40;
      color: #fff;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 50px;
      font-size: 18px;
      transition: background 0.3s ease;
    }

    .home-icon:hover {
      background: #002e26;
    }

    @media (max-width: 600px) {
      .container {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="index.php" class="home-icon">🏠</a>
    <h2>Login</h2>
    <form method="POST" action="login.php">
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>
