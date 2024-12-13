<?php
session_start();
include_once('helper/connection.php');
include_once('helper/header.php');

$userID = $_SESSION['user_id'];

if (isset($_POST['bloodGroup'])) {
    $bloodGroup = $_POST['bloodGroup'];
    $_SESSION['bloodg'] = $bloodGroup;

    // Sanitize user input to prevent SQL injection (consider using prepared statements)
    $bloodGroup = $mysqli->real_escape_string($bloodGroup);

    // Execute the query
    $query = "SELECT * FROM mp2 WHERE bloodType = '$bloodGroup'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        echo "<h1><br>Matching donors:</h1><br><br>";
        while ($row = $result->fetch_assoc()) {
            echo "Donor blood type ";
            echo $row['bloodType'] . "<br>";
            $user = $row['mp2_user_id'];

            $query3 = "SELECT * FROM mp1 WHERE mp1_user_id=$user";
            $result3 = $mysqli->query($query3);
            if ($result3 && $result3->num_rows > 0) {
                $row3 = $result3->fetch_assoc();

                if (isset($row3['firstname'])) {
                    echo "Donor name ";
                    echo $row3['firstname'] . " " . $row3['lastname'] . "<br>";
                } else {
                    echo "No organs donated by user.<br>.<br>.<br>";
                }
            } else {
                echo "Error retrieving user data.<br>";
            }

            $query2 = "SELECT * FROM mp3 WHERE mp3_user_id=$user";
            $result2 = $mysqli->query($query2);
            if ($result2 && $result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                if (isset($row2['organsDonated'])) {
                    echo "Organs donated ";
                    echo $row2['organsDonated'] . "<br><br>";
                } else {
                    echo "<br><br>No organs donated by this user.<br><br><br>";
                }
            } else {
                echo "<br><br>Error retrieving user data.<br><br><br>";
            }

            echo "<br><br>";
        }
    } else {
        echo "<h1><br>No matching donors found.<br><br></h1><br><br>";
    }
}
?>

<?php include_once('helper/header.php'); ?>
<title>Blood Group Form</title>
<link rel="stylesheet" href="static/form.css">
</head>
</br>
<div class="container">

    <form id="bloodGroupForm" action="donationalgoform.php" method="POST">
        <div class="form-group">
            <h2>Blood Group Form</h2>
            <label for="bloodGroup">Select your blood group:</label>
            <br>
            <select id="bloodGroup" name="bloodGroup" required>
                <option value="">-- Select --</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <button class="button" type="submit">Submit</button>
    </form>
</div>
</body>

</html>