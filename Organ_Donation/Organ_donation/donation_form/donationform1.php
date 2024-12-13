<?php
session_start();
include_once('../helper/connection.php');

$stm = $mysqli->prepare("SELECT fname, lname, email FROM users WHERE id = ?");
$stm->bind_param("i", $_SESSION['user_id']);
$stm->execute();
$stm->bind_result($finame, $laname, $eemail);
$stm->fetch();
$stm->close();

$firstname = $finame;
$lastname = $laname;
$email = $eemail;

$dob = $phone = $email = $address = $address2 = $city = $state = $zip = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';

    $errors = array();
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $sql = "INSERT INTO mp1 (firstname, lastname, dob, phone, email, address, address2, city, state, zip, mp1_user_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param(
            "ssssssssssi",
            $firstname,
            $lastname,
            $dob,
            $phone,
            $email,
            $address,
            $address2,
            $city,
            $state,
            $zip,
            $_SESSION['user_id']
        );

        if ($stmt->execute()) {
            header("location: ./donationform2.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$mysqli->close();
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
<br>
<form action="donationform1.php" method="post">
    <div class="form-section">
        <h2>Personal Information</h2>

        <!-- <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required> -->

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
        <!-- 
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required> -->

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="address2">Address Line 2:</label>
        <input type="text" id="address2" name="address2">

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State / Province:</label>
        <input type="text" id="state" name="state" required>

        <label for="zip">Postal / Zip Code:</label>
        <input type="text" id="zip" name="zip" required>

    </div>
    <button class="button">submit</button>
</form>

</body>