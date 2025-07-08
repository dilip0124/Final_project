<?php
session_start();

// Sirf logged in users hi access kar sake
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Village Tour</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background: #f1f8e9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .form-box {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #33691e;
      margin-bottom: 20px;
    }

    input, select, textarea {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      background: #558b2f;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    button:hover {
      background: #33691e;
    }

    a.back {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #33691e;
    }

  </style>
</head>
<body>

  <div class="form-box">
    <h2>Book a Village Tour</h2>
    <form action="process_booking.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($_SESSION['name']); ?>" required>

      <input type="email" name="email" placeholder="Email" required>

      <input type="date" name="date" required>

      <select name="village" required>
        <option value="">Select Village</option>
        <option value="Rampur">Tutlabhawani</option>
        <option value="Sundarpur"></option>
        <option value="Rajapur">Rajapur</option>
      </select>

      <textarea name="message" placeholder="Special request or message"></textarea>

      <button type="submit" name="book">Book Now</button>
    </form>

    <a class="back" href="user_dashboard.php">← Back to Dashboard</a>
  </div>

</body>
</html>
