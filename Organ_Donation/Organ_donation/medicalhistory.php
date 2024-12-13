<?php
session_start();
include_once('helper/connection.php');
$userid = $_SESSION['user_id'];

$stm = $mysqli->prepare("SELECT firstname, lastname, dob, city FROM mp1 WHERE mp1_user_id=?");
$stm->bind_param("i", $userid);
$stm->execute();

$stm->bind_result($finame, $laname, $ddob, $ccity);

$stm->fetch();

$full_name = $finame . ' ' . $laname;
$date_of_birth = $ddob;
$address = $ccity;
$stm->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
  $medical_conditions = isset($_POST["medical_conditions"]) ? $_POST["medical_conditions"] : [];
  $surgery = isset($_POST["surgery"]) ? $_POST["surgery"] : [];
  $family_history = isset($_POST["family_history"]) ? $_POST["family_history"] : "";
  $smoking = isset($_POST["smoking"]) ? $_POST["smoking"] : "";
  $alcohol = isset($_POST["alcohol"]) ? $_POST["alcohol"] : "";
  $allergies = isset($_POST["allergy"]) ? $_POST["allergy"] : [];
  $medications = isset($_POST["medication"]) ? $_POST["medication"] : [];

  $medical_conditions_imploded = is_array($medical_conditions) ? implode(", ", $medical_conditions) : '';
  $surgery_imploded = is_array($surgery) ? implode(", ", $surgery) : '';
  $allergies_imploded = is_array($allergies) ? implode(", ", $allergies) : '';
  $medications_imploded = is_array($medications) ? implode(", ", $medications) : '';

  if (empty($gender) || empty($smoking) || empty($alcohol)) {
    echo "Please fill out all required fields.";
  } else {
    $sql = "INSERT INTO health_form (full_name, date_of_birth, gender, medical_conditions, surgery, family_history, smoking, alcohol, allergies, medications, health_user_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stm = $mysqli->prepare($sql);
    $stm->bind_param("ssssssssssi", $full_name, $date_of_birth, $gender, $medical_conditions_imploded, $surgery_imploded, $family_history, $smoking, $alcohol, $allergies_imploded, $medications_imploded, $userid);

    if ($stm->execute()) {
      header("location: helper/thankyou.php");
      exit();
    } else {
      echo "Error: " . $stm->error;
    }

    $stm->close();
  }
}
?>

<!DOCTYPE html>

<html>

<head>
  <link rel="stylesheet" href="static/form.css">
  <title>Medical History Form</title>

  <link rel="stylesheet" href="path/to/medical-history-form.css">

</head>

<body>
  <?php
  include_once('helper/header.php');
  ?><br>
  <br>

  <div class="form-container">
    <form method="post" action="medicalhistory.php">
      <fieldset>
        <legend>Personal Information</legend>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="">Please select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

      </fieldset>
      </br>
      <fieldset>
        <legend>Medical History</legend>
        <label>Do you have any of the following conditions?</label><br>
        <input type="checkbox" id="diabetes" name="medical_conditions[]" value="diabetes">
        <label for="diabetes">Diabetes</label><br>
        <input type="checkbox" id="hypertension" name="medical_conditions[]" value="hypertension">
        <label for="hypertension">Hypertension</label><br>
        <input type="checkbox" id="heart_disease" name="medical_conditions[]" value="heart_disease">
        <label for="heart_disease">Heart Disease</label><br>
        <input type="checkbox" id="stroke" name="medical_conditions[]" value="stroke">
        <label for="stroke">Stroke</label><br>
      </fieldset>
      </br>
      <fieldset>
        <legend>Past Surgical History</legend>
        <label for="surgery1">Surgery #1:</label>
        <input type="text" id="surgery1" name="surgery[]">
        <label for="surgery2">Surgery #2:</label>
        <input type="text" id="surgery2" name="surgery[]">
      </fieldset>
      </br>
      <fieldset>
        <legend>Family Medical History</legend>
        <label for="family_history">Please specify any medical conditions that run in your family:</label>
        <textarea id="family_history" name="family_history" rows="4" cols="50"></textarea>
      </fieldset>
      </br>
      <fieldset>
        <legend>Social History</legend>
        <label for="smoking">Smoking status:</label>
        <select id="smoking" name="smoking" required>
          <option value="">Please select</option>
          <option value="never">Never smoked</option>
          <option value="former">Former smoker</option>
          <option value="current">Current smoker</option>
        </select>
        <label for="alcohol">Alcohol consumption:</label>
        <select id="alcohol" name="alcohol" required>
          <option value="">Please select</option>
          <option value="never">Never</option>
          <option value="occasional">Occasional</option>
          <option value="moderate">Moderate</option>
          <option value="heavy">Heavy</option>
        </select>
      </fieldset>
      </br>
      <fieldset>
        <legend>Allergies</legend>
        <label for="allergy1">Allergy #1:</label>
        <input type="text" id="allergy1" name="allergy[]">
        <label for="allergy2">Allergy #2:</label>
        <input type="text" id="allergy2" name="allergy[]">
      </fieldset>
      </br>
      <fieldset>
        <legend>Medications</legend>
        <label for="medication1">Medication #1:</label>
        <input type="text" id="medication1" name="medication[]">
        <label for="medication2">Medication #2:</label>
        <input type="text" id="medication2" name="medication[]">
        <label for="medication3">Medication #3:</label>
        <input type="text" id="medication3" name="medication[]">
        <label for="medication4">Medication #4:</label>
        <input type="text" id="medication4" name="medication[]">
      </fieldset>
      </br>
      <a href=""> <button type="submit" class="button">Submit</button></a>
    </form>
  </div>

</body>

</html>