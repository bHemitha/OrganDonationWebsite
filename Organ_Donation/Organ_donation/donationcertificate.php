<?php
session_start();
include_once('helper/connection.php');
include_once('helper/header.php');
$userID = $_SESSION['user_id'];
$query = "SELECT * FROM mp1 WHERE mp1_user_id = '$userID'";

$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['firstname'];
    $userlastName = $row['lastname'];
    $donorID = $row['mp1_id'];

} else {
    echo "No organ donation record found for the user.";
    exit();
}

// Generate a unique certificate number
$certificateNumber = uniqid();

// Function to format the donation date
function formatDonationDate($date)
{
    return date("F j, Y", strtotime($date));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Organ Donation Certificate</title>

    <style type='text/css'>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: auto;
        }

        .container {
            color: black;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
            border: 20px solid tan;
            padding: 20px;
            box-sizing: border-box;
        }

        .download-section {
            margin-top: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        button {
            background: black;
            color: tan;
            padding: 10px;
            font-size: 20px;
            font-weight: 4px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logo {
            color: tan;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }

        .assignment {
            margin: 20px;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: medium;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }

        .reason {
            margin: 20px;
        }
    </style>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>


</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="logo">
            Organ Donation
        </div>
        <h1>Organ Donation Certificate</h1>

        <p>This certificate is awarded to:</p>

        <div class="person">
            <p><strong>Name:</strong>
                <?php echo $userName;
                echo " ";
                echo $userlastName; ?>
            </p>
            <p><strong>ID:</strong>
                <?php echo $donorID; ?>
            </p>
        </div>

        <p>This is to certify that
            <?php echo $userName;
            echo " ";
            echo $userlastName; ?> has selflessly donated their organs to save lives. The
            noble act of organ donation demonstrates compassion, generosity, and the desire to make a positive impact on
            society.
        </p>
        <div class="marquee">
            <p>By making this selfless donation,
                <?php echo $userName;
                echo " ";
                echo $userlastName; ?> has provided hope and a new lease on life to those
                in need. Their act of kindness will forever be remembered and cherished.
            </p>
        </div>
        <div class="signature">
            <p>Authorized Signature</p>
        </div>

        <p class="signature-line">_______________________</p>

        <p class="certificate-number">Certificate Number:
            <?php echo $certificateNumber; ?>
        </p>
    </div>
    </div>
    </br>
    </br>
    <div class="download-section">
        <button onclick="downloadCertificate()">Download Certificate</button>
    </div>
    </br>
    </br>
    <script>
        function downloadCertificate() {
            var element = document.querySelector('.container');
            html2pdf(element);
        }
    </script>
</body>

</html>