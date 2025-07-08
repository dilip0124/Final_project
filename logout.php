<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
<body>
  <header>
    <h1>Logout Successful</h1>
  </header>
  <div class="content">