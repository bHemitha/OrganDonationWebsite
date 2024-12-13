<?php
session_start();
include_once('../helper/connection.php');
$userid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    }

    h1 {
      font-size: 3em;
      margin-top: 2em;
      margin-bottom: 0.5em;
    }

    p {
      font-size: 1.5em;
      margin-top: 0;
      margin-bottom: 2em;
    }
  </style>
  <meta charset="UTF-8">
  <title>Thank you for submitting your details!</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include_once('header.php');
  ?>
  <div class="container">
    <h1>Thank you for submitting your details!</h1>
    <p>We have received your information and will be in touch soon.</p>
  </div>
</body>

</html>