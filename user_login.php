<?php
session_start();
include 'db.php';

$msg = '';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    header("Location: user_dashboard.php");
    exit();
  } else {
    $msg = "Invalid login credentials.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
</head>
<body>
  <h2>User Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
    <p style="color:red;"><?php echo $msg; ?></p>
  </form>
</body>
</html>
