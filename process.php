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

  echo "Form data received:<br>";
  echo "$name, $email, $date, $village, $message <br><br>";

  $sql = "INSERT INTO bookings (name, email, date, village, message)
          VALUES ('$name', '$email', '$date', '$village', '$message')";

  if ($conn->query($sql)) {
    echo "<script>alert('Your tour has been booked successfully!'); window.location='booking.php';</script>";
  } else {
    echo "Error inserting into DB: " . $conn->error;
  }
} else {
  echo "Form not submitted properly.";
}
?>
