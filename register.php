<?php
include 'db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user'; // ✅ Har user ko 'user' role milega

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$pass', '$role')";

    if ($conn->query($sql)) {
        echo "<script>alert('Registered Successfully'); window.location='login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f0f0;
      padding: 30px;
      text-align: center;
    }
    form {
      background: white;
      max-width: 400px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    input, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<h2>Register as User</h2>
<form method="POST" action="register.php">
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit" name="register">Register</button>
</form>

</body>
</html>
