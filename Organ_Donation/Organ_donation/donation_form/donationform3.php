<?php
session_start();
include_once('../helper/connection.php');
$userid = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registrationDate = isset($_POST['registration-date']) ? $_POST['registration-date'] : '';
    $organsDonated = isset($_POST['organ']) ? implode(", ", $_POST['organ']) : '';
    $purpose = isset($_POST['purpose']) ? $_POST['purpose'] : '';
    $confirmation = isset($_POST['confirm']) ? 1 : 0;
    $donationPermission = isset($_POST['donation']) ? 1 : 0;
    $familyAcknowledgment = isset($_POST['family']) ? 1 : 0;
    $cardConfirmation = isset($_POST['card']) ? 1 : 0;
    $registryPermission = isset($_POST['registry']) ? 1 : 0;

    $registrationDate = mysqli_real_escape_string($mysqli, $registrationDate);
    $organsDonated = mysqli_real_escape_string($mysqli, $organsDonated);
    $purpose = mysqli_real_escape_string($mysqli, $purpose);

    $sql = "INSERT INTO mp3 (registrationDate, organsDonated, purpose, confirmation, donationPermission, familyAcknowledgment, cardConfirmation, registryPermission, mp3_user_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            registrationDate = VALUES(registrationDate),
            organsDonated = VALUES(organsDonated),
            purpose = VALUES(purpose),
            confirmation = VALUES(confirmation),
            donationPermission = VALUES(donationPermission),
            familyAcknowledgment = VALUES(familyAcknowledgment),
            cardConfirmation = VALUES(cardConfirmation),
            registryPermission = VALUES(registryPermission)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssiisiii", $registrationDate, $organsDonated, $purpose, $confirmation, $donationPermission, $familyAcknowledgment, $cardConfirmation, $registryPermission, $userid);

    if ($stmt->execute()) {
        header("location: donationform4.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>




<!DOCTYPE html>
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
    <?php
    include_once('../helper/header.php');
    ?><br>
    <br>
    <form action="donationform3.php" method="post">
        <h2>Organ Donation Details</h2>
        <div class="form-group">
            <label for="registration-date">Date of Registration:</label>
            <input type="date" id="registration-date" name="registration-date" required>
        </div>
        <div class="form-group">
            <label for="organs-donated">Organs to be donated:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="organ[]" value="Liver"> Liver</label>
                <label><input type="checkbox" name="organ[]" value="Kidney"> Kidney</label>
                <label><input type="checkbox" name="organ[]" value="Pancreas"> Pancreas</label>
                <label><input type="checkbox" name="organ[]" value="Heart"> Heart</label>
                <label><input type="checkbox" name="organ[]" value="Cornea"> Cornea</label>
                <label><input type="checkbox" name="organ[]" value="Bone"> Bone</label>
                <label><input type="checkbox" name="organ[]" value="Lung"> Lung</label>
                <label><input type="checkbox" name="organ[]" value="Bone Marrow"> Bone Marrow</label>
                <label><input type="checkbox" name="organ[]" value="All"> All of the above</label>
            </div>
        </div>
        <div class="form-group">
            <label for="purpose">Specific Purpose:</label>
            <select id="purpose" name="purpose" required>
                <option value="Medical Transplant">Medical Transplant</option>
                <option value="Educational/Research">Educational/Research</option>
                <option value="Both">Both Medical Transplant and Educational/Research</option>
            </select>
        </div>

        <div class="acknowledgment">
            <h2>Acknowledgment and Terms</h2>
            <form>
                <label>
                    <input type="checkbox" name="confirm" required> I confirm that the information I
                    provided in this
                    document is accurate and true.
                </label>
                <br>
                <label>
                    <input type="checkbox" name="donation" required> I allow my organs to be donated for
                    medical
                    transplant or educational/research purposes.
                </label>
                <br>
                <label>
                    <input type="checkbox" name="family" required> I acknowledge that I have to inform
                    my family about
                    this registration.
                </label>
                <br>
                <label>
                    <input type="checkbox" name="card" required> I confirm that I always need to keep
                    the organ donor
                    card and the document that came with it.
                </label>
                <br>
                <label>
                    <input type="checkbox" name="registry" required> I allow my information to be
                    submitted to donor
                    registry.
                </label>
                <br>
        </div>

        </div>
        <button class="button">submit</button>
    </form>

    </body>

</html>