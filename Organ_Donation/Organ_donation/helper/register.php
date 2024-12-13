<?php
session_start();
include_once('./connection.php');

if (isset($_SESSION['user_id'])) {
  header('location: ../home.php');
  exit();
}

if (isset($_POST['register'])) {
  if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
  $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (fname,lname, email, password) VALUES ('$fname','$lname', '$email', '$hashed_password')";
  if (mysqli_query($mysqli, $sql)) {
    $userid = $mysqli->insert_id;
    $_SESSION['user_id'] = $userid;
    $_SESSION['success_msg'] = "Registration successful!";
    header("location: ../home.php");
    exit();
  } else {
    $_SESSION['error_msg'] = "Registration failed. Please try again later.";
  }
}
?>

<link rel="stylesheet" href="../static/form.css">


<head>

  <title>Register</title>
</head>

<body>
  </br>
  </br>
  <div class="container" id="registration-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h2>Registration</h2>
      <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>
      </div>
      <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="terms">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">I agree to the terms and conditions</label>
      </div>
      <input type="submit" name="register" value="Register">
    </form>
  </div>


</body>

</html>