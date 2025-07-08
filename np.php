<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';
if (isset($_POST['book'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $village = $_POST['village'];
  $message = $_POST['message'];

  $sql = "INSERT INTO bookings (name, email, date, village, message)
          VALUES ('$name', '$email', '$date', '$village', '$message')";

  if ($conn->query($sql)) {
    echo "<script>alert('Your tour has been booked successfully!'); window.location='booking.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
