<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Your Tour</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .booking-bg {
      background:
        linear-gradient(135deg, rgba(35,41,70,0.8) 0%, rgba(95,108,175,0.6) 100%),
        url('in.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      padding: 0;
      margin: 0;
    }

    .home-icon {
      position: absolute;
      top: 20px;
      right: 25px;
      background: #222;
      color: #fff;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 50px;
      font-size: 18px;
      transition: background 0.3s ease;
    }

    .home-icon:hover {
      background: #444;
    }

    header {
      text-align: center;
      padding: 20px;
      background: rgba(0,0,0,0.5);
      color: #fff;
    }

    .form-container {
      max-width: 500px;
      margin: 40px auto;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    input, select, textarea, button {
      width: 100%;
      margin-bottom: 15px;
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      background-color: #33691e;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #1b5e20;
    }

    footer {
      text-align: center;
      padding: 15px;
      color: #fff;
      background: rgba(0,0,0,0.6);
      position: fixed;
      width: 100%;
      bottom: 0;
    }

    @media (max-width: 600px) {
      .form-container {
        margin: 20px;
        padding: 20px;
      }
      .home-icon {
        top: 15px;
        right: 15px;
        font-size: 16px;
        padding: 6px 10px;
      }
    }
  </style>
</head>
<body class="booking-bg">

  <a href="index.php" class="home-icon">🏠</a>

  <header><h1>Book Your Village Tour</h1></header>

  <form action="process.php" method="POST" class="form-container">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="date" name="date" required>
    <select name="village">
      <option value="Durgawati">Durgawati</option>
      <option value="Rohtash Fort">Rohtash Fort</option>
      <option value="Tutlabhawani Waterfall">Tutlabhawani</option>
    </select>
    <textarea name="message" placeholder="Special requests or message"></textarea>
    <button type="submit" name="book">Submit Booking</button>
  </form>

  <footer><p>&copy; 2025 Village Tour India</p></footer>

</body>
</html>
