<?php
session_start();

// If not admin, redirect to login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Village Tour</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #f1f8e9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background: #33691e;
      color: white;
      padding: 20px;
      text-align: center;
    }

    .dashboard {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #33691e;
    }

    .info {
      margin-top: 30px;
    }

    .info p {
      font-size: 18px;
      margin: 10px 0;
    }

    .btn {
      display: inline-block;
      background: #558b2f;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 20px;
    }

    .btn:hover {
      background: #33691e;
    }

    footer {
      text-align: center;
      padding: 15px;
      background: #ccc;
      margin-top: 50px;
    }

    .back-home {
      display: inline-block;
      position: fixed;
      bottom: 20px;
      left: 20px;
      background: #33691e;
      color: white;
      padding: 10px 15px;
      border-radius: 30px;
      font-size: 16px;
      text-decoration: none;
      box-shadow: 2px 2px 8px rgba(0,0,0,0.3);
      transition: background 0.3s;
      z-index: 999;
    }

    .back-home:hover {
      background: #1b5e20;
    }
  </style>
</head>
<body>

<header>
  <h1>Welcome Admin - <?php echo $_SESSION['name']; ?></h1>
</header>

<div class="dashboard">
  <h2>Admin Dashboard</h2>

  <div class="info">
    <p>✅ View all bookings</p>
    <p>✅ Manage users</p>
    <p>✅ Monitor site activity</p>
    <p>✅ Add new tour packages</p>
  </div>

  <a href="view-bookings.php" class="btn">View Bookings</a>
  <a href="logout.php" class="btn" style="background:#b71c1c;">Logout</a>
</div>

<!-- Back to Home Button -->
<a href="index.php" class="back-home">🏠 Home</a>

<footer>
  &copy; 2025 Village Tour India
</footer>

</body>
</html>
