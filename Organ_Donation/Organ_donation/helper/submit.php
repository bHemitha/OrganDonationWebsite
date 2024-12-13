<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create a connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Handle the signature uploads
  $targetDir = "uploads/";

  // Donor Signature
  $donorSignatureFile = $_FILES["donorSignature"];
  $donorSignatureFileName = basename($donorSignatureFile["name"]);
  $donorSignatureFileTmp = $donorSignatureFile["tmp_name"];
  $donorSignatureFileType = strtolower(pathinfo($donorSignatureFileName, PATHINFO_EXTENSION));

  // Check if the file is a valid image
  $validExtensions = ["jpg", "jpeg"];
  if (!in_array($donorSignatureFileType, $validExtensions)) {
    echo "Only JPG and JPEG files are allowed for the Donor Signature.";
    exit;
  }

  // Move the uploaded file to the target directory
  $donorSignatureTargetFile = $targetDir . $donorSignatureFileName;
  if (!move_uploaded_file($donorSignatureFileTmp, $donorSignatureTargetFile)) {
    echo "Error uploading the Donor Signature file.";
    exit;
  }

  // Witness Signature
  $witnessSignatureFile = $_FILES["witnessSignature"];
  $witnessSignatureFileName = basename($witnessSignatureFile["name"]);
  $witnessSignatureFileTmp = $witnessSignatureFile["tmp_name"];
  $witnessSignatureFileType = strtolower(pathinfo($witnessSignatureFileName, PATHINFO_EXTENSION));

  // Check if the file is a valid image
  if (!in_array($witnessSignatureFileType, $validExtensions)) {
    echo "Only JPG and JPEG files are allowed for the Witness Signature.";
    exit;
  }

  // Move the uploaded file to the target directory
  $witnessSignatureTargetFile = $targetDir . $witnessSignatureFileName;
  if (!move_uploaded_file($witnessSignatureFileTmp, $witnessSignatureTargetFile)) {
    echo "Error uploading the Witness Signature file.";
    exit;
  }

  // Doctor Signature
  $doctorSignatureFile = $_FILES["doctorSignature"];
  $doctorSignatureFileName = basename($doctorSignatureFile["name"]);
  $doctorSignatureFileTmp = $doctorSignatureFile["tmp_name"];
  $doctorSignatureFileType = strtolower(pathinfo($doctorSignatureFileName, PATHINFO_EXTENSION));

  // Check if the file is a valid image
  if (!in_array($doctorSignatureFileType, $validExtensions)) {
    echo "Only JPG and JPEG files are allowed for the Doctor Signature.";
    exit;
  }

  // Move the uploaded file to the target directory
  $doctorSignatureTargetFile = $targetDir . $doctorSignatureFileName;
  if (!move_uploaded_file($doctorSignatureFileTmp, $doctorSignatureTargetFile)) {
    echo "Error uploading the Doctor Signature file.";
    exit;
  }

  // Retrieve form values
  $donorDate = isset($_POST['donor-date']) ? $_POST['donor-date'] : '';

  $witnessDate = isset($_POST['witness-date']) ? $_POST['witness-date'] : '';

  $doctorDate = isset($_POST['doctor-date']) ? $_POST['doctor-date'] : '';

  // Sanitize and escape the data
  $donorDate = mysqli_real_escape_string($mysqli, $donorDate);
  $witnessDate = mysqli_real_escape_string($mysqli, $witnessDate);
  $doctorDate = mysqli_real_escape_string($mysqli, $doctorDate);

  // Insert the data into the database
  $sql = "INSERT INTO signatures2 (donorSignature, donorDate, witnessSignature, witnessDate, doctorSignature, doctorDate)
        VALUES ('$donorSignatureTargetFile', '$donorDate', '$witnessSignatureTargetFile', '$witnessDate', '$doctorSignatureTargetFile', '$doctorDate')";

  if ($mysqli->query($sql) === TRUE) {
    echo "Form submitted successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
}
?>

<html>

<head>
</head>

<body>
  <form action="submit.php?userid=<?php echo $_GET['userid']; ?>" method="post" enctype="multipart/form-data">

    <label>Signature of Donor:</label>
    <label for="donorSignature">Select donorSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="donorSignature" name="donorSignature" accept=".jpg, .jpeg" required>
    <input type="submit" value="Upload">
    <label>Date Signed:</label>
    <input type="date" name="donordate" required>



    <label>Signature of Witness/ Parent/Guardian for Minors:</label>
    <label for="witnessSignature">Select witnessSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="witnessSignature" name="witnessSignature" accept=".jpg, .jpeg" required>
    <input type="submit" value="Upload">
    <label>Date Signed:</label>
    <input type="date" name="witness-date" required>


    <label>Signature of Doctor/Physician:</label>
    <label for="doctorSignature">Select doctorSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="doctorSignature" name="doctorSignature" accept=".jpg, .jpeg" required>
    <input type="submit" value="Upload">
  </form>
  <label>Date Signed:</label>
  <input type="date" name="doctor-date" required>
  <button class="button">submit</button>
  </form>
</body>

</html>