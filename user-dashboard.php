<?php
session_start();

// Agar user login nahi kiya to login page pe bhej do
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #f0f4f8;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background: #1976d2;
      color: white;
      padding: 15px 20px;
      text-align: center;
    }

    .content {
      max-width: 700px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      text-align: center;
    }

    .content h2 {
      color: #1976d2;
    }

    .logout-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background: #d32f2f;
      color: white;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }

    .logout-btn:hover {
      background: #b71c1c;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>Welcome to Village Tour - User Dashboard</h1>
  </div>

  <div class="content">
    <h2>Hello, <?php echo $_SESSION['name']; ?> 👋</h2>
    <p>You have successfully logged in as a <strong>User</strong>.</p>

    <a href="book.php" class="logout-btn" style="background:#388e3c;">Book a Tour</a><br><br>

    <a href="logout.php" class="logout-btn">Logout</a>
  </div>

</body>
</html>
