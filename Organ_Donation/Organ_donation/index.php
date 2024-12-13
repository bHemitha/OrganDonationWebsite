<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Welcome to My Website</title>
  <link rel="stylesheet" href="static/form.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .box {
      text-align: center;
      margin: 100px auto;
      background-color: #000;
      padding: 100px;
      width: 60%;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    h1 {
      font-size: 36px;
    }

    p {
      font-size: 18px;
    }

    .btn {
      display: inline-block;
      margin: 10px;
      padding: 15px 30px;
      text-decoration: none;
      color: #fff;
      background-color: #333;
      border-radius: 5px;
      font-size: 18px;
    }

    .btn:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="box">
    <h1>Welcome to My Website</h1>
    <p>Please select an option:</p>
    <a href="helper/register.php" class="btn">Register</a>
    <a href="helper/login.php" class="btn">Login</a>
  </div>
</body>

</html>