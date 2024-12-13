<?php
session_start();
include_once('../helper/connection.php');
$userid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : '';
    $bp = isset($_POST['bp']) ? $_POST['bp'] : '';
    $pulse = isset($_POST['pulse']) ? $_POST['pulse'] : '';
    $respiratory = isset($_POST['respiratory']) ? $_POST['respiratory'] : '';
    $height = isset($_POST['height']) ? $_POST['height'] : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
    $bloodType = isset($_POST['bloodType']) ? $_POST['bloodType'] : '';
    $allergies = isset($_POST['allergies']) ? $_POST['allergies'] : '';
    $medications = isset($_POST['medications']) ? $_POST['medications'] : '';
    $medicalCondition = isset($_POST['medicalCondition']) ? $_POST['medicalCondition'] : '';
    $hospitalization = isset($_POST['hospitalization']) ? $_POST['hospitalization'] : '';
    $asthma = isset($_POST['asthma']) ? 1 : 0;
    $cardiovascular = isset($_POST['cardiovascular']) ? 1 : 0;
    $diabetes = isset($_POST['diabetes']) ? 1 : 0;
    $hypertension = isset($_POST['hypertension']) ? 1 : 0;
    $tuberculosis = isset($_POST['tuberculosis']) ? 1 : 0;
    $other = isset($_POST['other']) ? 1 : 0;
    $_SESSION['bloodg'] = $bloodType;

    $temperature = mysqli_real_escape_string($mysqli, $temperature);
    $bp = mysqli_real_escape_string($mysqli, $bp);
    $pulse = mysqli_real_escape_string($mysqli, $pulse);
    $respiratory = mysqli_real_escape_string($mysqli, $respiratory);
    $height = mysqli_real_escape_string($mysqli, $height);
    $weight = mysqli_real_escape_string($mysqli, $weight);
    $bloodType = mysqli_real_escape_string($mysqli, $bloodType);
    $allergies = mysqli_real_escape_string($mysqli, $allergies);
    $medications = mysqli_real_escape_string($mysqli, $medications);
    $medicalCondition = mysqli_real_escape_string($mysqli, $medicalCondition);
    $hospitalization = mysqli_real_escape_string($mysqli, $hospitalization);

    $sql = "INSERT INTO mp2 (temperature, bp, pulse, respiratory, height, weight, bloodType, allergies, medications, medicalCondition, hospitalization, asthma, cardiovascular, diabetes, hypertension, tuberculosis, other, mp2_user_id)
            VALUES ('$temperature', '$bp', '$pulse', '$respiratory', '$height', '$weight', '$bloodType', '$allergies', '$medications', '$medicalCondition', '$hospitalization', '$asthma', '$cardiovascular', '$diabetes', '$hypertension', '$tuberculosis', '$other', '$userid')
            ON DUPLICATE KEY UPDATE
            temperature = VALUES(temperature),
            bp = VALUES(bp),
            pulse = VALUES(pulse),
            respiratory = VALUES(respiratory),
            height = VALUES(height),
            weight = VALUES(weight),
            bloodType = VALUES(bloodType),
            allergies = VALUES(allergies),
            medications = VALUES(medications),
            medicalCondition = VALUES(medicalCondition),
            hospitalization = VALUES(hospitalization),
            asthma = VALUES(asthma),
            cardiovascular = VALUES(cardiovascular),
            diabetes = VALUES(diabetes),
            hypertension = VALUES(hypertension),
            tuberculosis = VALUES(tuberculosis),
            other = VALUES(other)";

    if ($mysqli->query($sql) === TRUE) {
        header("location: donationform3.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>
<?php
include_once('../helper/header.php');
?><br>
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
    <form action="donationform2.php" method="post">
        <h2>Medical Data Form</h2>
        <h2>Vital Signs</h2>
        <label for="temperature">Temperature (C)</label>
        <input type="text" id="temperature" name="temperature" required>

        <label for="bp">BP (mmHg)</label>
        <input type="text" id="bp" name="bp" required>

        <label for="pulse">Pulse Rate (bpm)</label>
        <input type="text" id="pulse" name="pulse" required>

        <label for="respiratory">Respiratory Rate (bpm)</label>
        <input type="text" id="respiratory" name="respiratory" required>

        <h2>Vital Signs</h2>
        <label for="height">Height (ft)</label>
        <input type="text" id="height" name="height" required>

        <label for="weight">Weight (kg)</label>
        <input type="text" id="weight" name="weight" required>

        <label for="bloodType">Blood Type</label>
        <select id="bloodType" name="bloodType" required>
            <option value="">Please Select</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <label for="allergies">Do you have any known allergies? If yes, then please specify below.</label>
        <textarea id="allergies" name="allergies"></textarea>

        <label for="medications">Are you currently taking medications? If yes, then please list the
            medications and
            the reasons why are you taking them.</label>
        <textarea id="medications" name="medications"></textarea>

        <label for="medicalCondition">What is your current medical condition? Do you have any communicable
            disease,
            cardiovascular problems, diabetes, asthma etc.?</label>
        <textarea id="medicalCondition" name="medicalCondition"></textarea>

        <label for="hospitalization">Previous hospitalization (Provide the reason and treatment)</label>
        <textarea id="hospitalization" name="hospitalization"></textarea>

        <h2>Family History Illnesses</h2>
        <input type="checkbox" id="asthma" name="asthma">
        <label for="asthma">Asthma</label>

        <input type="checkbox" id="cardiovascular" name="cardiovascular">
        <label for="cardiovascular">Cardiovascular Disease</label>

        <input type="checkbox" id="diabetes" name="diabetes">
        <label for="diabetes">Diabetes Mellitus</label>

        <input type="checkbox" id="hypertension" name="hypertension">
        <label for="hypertension">Hypertension</label>

        <input type="checkbox" id="tuberculosis" name="tuberculosis">
        <label for="tuberculosis">Tuberculosis</label>

        <input type="checkbox" id="other" name="other">
        <label for="other">Other</label>

        <div class="form-section">
            <button class="button">submit</button>
    </form>

</body>

</html>