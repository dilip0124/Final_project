<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: user_login.php");
  exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT b.*, p.name AS pg_name, p.location 
          FROM bookings b 
          JOIN pg_list p ON b.pg_id = p.id 
          WHERE b.user_id = '$user_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
  <a href="logout.php">Logout</a>
  <h3>Your Booked Tickets:</h3>
  <table border="1" cellpadding="10">
    <tr>
      <th>PG Name</th>
      <th>Location</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['pg_name']; ?></td>
      <td><?php echo $row['location']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['message']; ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
