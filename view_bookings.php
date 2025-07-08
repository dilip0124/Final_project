<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

$sql = "SELECT * FROM bookings ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Bookings</title>
  <style>
    body {
      font-family: Arial;
      background: #f2f2f2;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      background: white;
      padding: 25px;
      border-radius: 8px;
      margin: auto;
      box-shadow: 0 0 10px gray;
    }
    h2 {
      margin-bottom: 20px;
      color: #00695c;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #00695c;
      color: white;
    }
    a.logout {
      display: inline-block;
      margin-top: 20px;
      background: #e74c3c;
      padding: 10px 15px;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>All Tour Bookings</h2>

    <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Village</th>
        <th>Message</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['village'] ?></td>
          <td><?= $row['message'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
    <?php else: ?>
      <p>No bookings found.</p>
    <?php endif; ?>

    <a href="admin_dashboard.php" class="logout">⬅ Back to Dashboard</a>
  </div>
</body>
</html>
