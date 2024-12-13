<?php
session_start();
include_once('./connection.php');

if (isset($_SESSION['user_id'])) {
  header("location: ../home.php");
  exit();
}

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      header("location: ../home.php");
      exit();
    } else {
      $_SESSION['error_msg'] = "Invalid email or password.";
    }
  } else {
    $_SESSION['error_msg'] = "Invalid email or password.";
  }
  mysqli_close($mysqli);
}
?>
<link rel="stylesheet" href="../static/form.css">

<head>
  <title>Login</title>
</head>

<body>
  <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h1>Login</h1>
      <label>Email:</label>
      <input type="email" name="email" required><br><br>

      <label>Password:</label>
      <input type="password" name="password" required><br><br>

      <input type="submit" name="login" value="Login" class="btn">
    </form>
  </div>
  <?php
  // display error message
  if (isset($_SESSION['error_msg'])) {
    echo "<p style='color:red'>" . $_SESSION['error_msg'] . "</p>";
    unset($_SESSION['error_msg']);
  }
  ?>
</body>

</html>