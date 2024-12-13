<?php

session_start();
include_once('../helper/connection.php');
$userid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $targetDir = __DIR__ . '/uploads/';

  function uploadFile($file, $targetDir)
  {
    $fileName = basename($file["name"]);
    $fileTmp = $file["tmp_name"];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $validExtensions = ["jpg", "jpeg"];

    if (!in_array($fileType, $validExtensions)) {
      return "Only JPG and JPEG files are allowed for the $fileType Signature.";
    }

    $targetFile = $targetDir . $fileName;

    if (!move_uploaded_file($fileTmp, $targetFile)) {
      return "Error uploading the $fileType Signature file.";
    }
    return $targetFile;
  }

  $donorSignatureFile = $_FILES["donorSignature"];
  $witnessSignatureFile = $_FILES["witnessSignature"];
  $doctorSignatureFile = $_FILES["doctorSignature"];

  $donorSignatureTargetFile = uploadFile($donorSignatureFile, $targetDir);
  $witnessSignatureTargetFile = uploadFile($witnessSignatureFile, $targetDir);
  $doctorSignatureTargetFile = uploadFile($doctorSignatureFile, $targetDir);

  $donorDate = isset($_POST['donor-date']) ? $_POST['donor-date'] : '';
  $witnessDate = isset($_POST['witness-date']) ? $_POST['witness-date'] : '';
  $doctorDate = isset($_POST['doctor-date']) ? $_POST['doctor-date'] : '';

  $donorDate = mysqli_real_escape_string($mysqli, $donorDate);
  $witnessDate = mysqli_real_escape_string($mysqli, $witnessDate);
  $doctorDate = mysqli_real_escape_string($mysqli, $doctorDate);

  $sql = "INSERT INTO signatures2 (donorSignature, donorDate, witnessSignature, witnessDate, doctorSignature, doctorDate,mp4_user_id)
            VALUES ('$donorSignatureTargetFile', '$donorDate', '$witnessSignatureTargetFile', '$witnessDate', '$doctorSignatureTargetFile', '$doctorDate','$userid')
            ON DUPLICATE KEY UPDATE
            donorSignature = VALUES(donorSignature), donorDate = VALUES(donorDate),
            witnessSignature = VALUES(witnessSignature), witnessDate = VALUES(witnessDate),
            doctorSignature = VALUES(doctorSignature), doctorDate = VALUES(doctorDate)";

  if ($mysqli->query($sql) === TRUE) {
    header("location: ../helper/thankyou.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  $mysqli->close();
}
?>



<html>

<head>
  <link rel="stylesheet" href="../static/form.css">
  <style>
    * {
      box-sizing: border-box;
    }

    .header {
      background-color: #f1f1f1;
      padding: 20px;
      text-align: center;
    }

    .column {
      float: left;
      padding: 10px;
    }

    .column.side {
      width: 15%;
    }

    .column.middle {
      width: 70%;
    }

    .row::after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>

<body>
  <br>
  <form action="donationform4.php" method="post" enctype="multipart/form-data">

    <label>Signature of Donor:</label>
    <label for="donorSignature">Select donorSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="donorSignature" name="donorSignature" accept=".jpg, .jpeg" required>
    <label>Date Signed:</label>
    <input type="date" name="donordate" required>



    <label>Signature of Witness/ Parent/Guardian for Minors:</label>
    <label for="witnessSignature">Select witnessSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="witnessSignature" name="witnessSignature" accept=".jpg, .jpeg" required>
    <label>Date Signed:</label>
    <input type="date" name="witness-date" required>


    <label>Signature of Doctor/Physician:</label>
    <label for="doctorSignature">Select doctorSignature image (only .jpg and .jpeg files allowed):</label>
    <input type="file" id="doctorSignature" name="doctorSignature" accept=".jpg, .jpeg" required>
    <label>Date Signed:</label>
    <input type="date" name="doctor-date" required>
    </br>
    </br>
    <button class="button">submit</button>
  </form>
</body>

</html>