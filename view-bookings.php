<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM bookings ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Bookings - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #fff3e0;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background: #e65100;
      color: white;
      padding: 20px;
      text-align: center;
    }

    table {
      width: 95%;
      margin: 30px auto;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: left;
    }

    th {
      background: #ff9800;
      color: white;
    }

    tr:nth-child(even) {
      background: #f5f5f5;
    }

    .btn {
      display: inline-block;
      background: #e65100;
      color: white;
      padding: 8px 16px;
      margin: 20px auto;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
    }

    .btn:hover {
      background: #bf360c;
    }
  </style>
</head>
<body>

<header>
  <h1>All Tour Bookings</h1>
</header>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Date</th>
    <th>Village</th>
    <th>Message</th>
  </tr>
  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= htmlspecialchars($row['name']); ?></td>
        <td><?= htmlspecialchars($row['email']); ?></td>
        <td><?= $row['date']; ?></td>
        <td><?= $row['village']; ?></td>
        <td><?= htmlspecialchars($row['message']); ?></td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="6" style="text-align:center;">No bookings found.</td>
    </tr>
  <?php endif; ?>
</table>

<div style="text-align:center;">
  <a href="admin-dashboard.php" class="btn">Back to Dashboard</a>
</div>

</body>
</html>
