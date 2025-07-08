<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.html");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <a href="feedback.php">Feedback</a>
    <a href="process.php?logout=true">Logout</a>
    <a href="register.html">Register</a>
    <a href="login.php">Booking</a>
    <a href="about.html">About</a>
  </header>
  <main>
    <h2>Your Courses</h2>
    <ul>
      <li>HTML & CSS</li>
      <li>JavaScript</li>
      <li>PHP & MySQL</li>
    </ul>
  </main>
</body>
</html>
