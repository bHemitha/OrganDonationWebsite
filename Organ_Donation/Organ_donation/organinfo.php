<?php

include_once('helper/connection.php');

include_once('helper/header.php');

echo "<br>";
$sql1 = "SELECT * FROM mp1";
$result1 = $mysqli->query($sql1);
echo '<strong><h1>Information about our donors:</h1></strong>' . "<br>" . "<br>";


if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        echo "<h3>NAME: " . $row['firstname'] . "</h3>";
        echo "<h3>LASTNAME: " . $row['lastname'] . "</h3>";
        echo "<h3>DOB: " . $row['dob'] . "</h3>";
        $mp2id = $row['mp1_user_id'];

        $query2 = "SELECT * FROM mp3  WHERE mp3_user_id=$mp2id";
        $result2 = $mysqli->query($query2);
        if ($result2 && $result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            if (isset($row2['organsDonated'])) {
                echo "<h3>ORGAN DONATED :" . $row2['organsDonated'] . "</h3>";
                echo "<h3>PURPOSE: " . $row2['purpose'] . "</h3>";
            } else {
                echo "<br><br><h3>No organs donated by this user.</h3>";
            }
        } else {
            echo "<h3>Error retrieving user data.</h3>";
        }
        echo "<br><br><br><br>";
    }
} else {
    echo "<h3>No results found.</h3>";
}


// Retrieve data from the database table


$mysqli->close();
?>
<html>

<head>
    <style>
        body {
            text-align: center;
        }
    </style>

</head>

<body>

</body>

</html>