<?php
// dashboard.php
session_start(); // Must be called before accessing $_SESSION or any HTML output

// Check if the user is actually logged in
if (!isset($_SESSION['username']))
    {
        header("Location: login.php");
        exit();
    }

// Retrieve the username
$member_id = $_SESSION['community_member_id'];
$email = $_SESSION['fk_com_user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include '../DB/dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
    die ("<br> INVALID REQUEST METHOD");
}


$date = isset($_POST["date"]) ? trim($_POST["date"]) : '';
$municipal_service = isset($_POST["incidenttype"]) ? trim($_POST["incidenttype"]) : '';

$image = isset($_FILES['picture']['name']) ? $_FILES['picture']['name'] : '';
$destination = "Images/" . $image;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

$address = isset($_POST["PhysAddress"]) ? trim($_POST["PhysAddress"]) : '';
$ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : '';
$incident_description = isset($_POST["descsofincident"]) ? trim($_POST["descsofincident"]) : '';

//Checks whether required fields are not empty

if (empty($date) || empty($municipal_service) || empty($address) || empty($ward) ||empty($incident_description)) 
    {
        die("All field must be filled, return and fill them");
    }

//Checks if user exist
$sql1 = "SELECT email FROM users WHERE email = '$email'";
$result = $conn->query($sql1);

if ($result->num_rows == 0)
    {
        // User does not exist - redirect to signup page
        echo 'user does not exist';
        header("Location: signup.html?error=notfound&idnumber=" . urlencode($email));
        exit();
    }

//Prepared statement for security
$sql1incident= ("INSERT INTO ticket (community_member_id, ward, municipal_service, incident_description, incident_address, date_filed, picture) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt = $conn->prepare($sql1incident);

if ($stmt === false)
    {
        die("Prepare failed: " . $conn->error);
    }

$stmt->bind_param("iisssss", $member_id, $ward, $municipal_service, $incident_description, $address, $date, $image);


// Execute the statement
if($stmt->execute())
    {
        echo "<br>Incident successfully reported! <br>";
        echo "Your reference number is: " . $stmt->insert_id . "<br>";
    } 

else
    { 
        die("<br> Execute failed: " . $stmt->error);
    }
// Close statement and connection
$stmt->close();
$conn->close();

//Navigation links
echo "<p><a href=\"index.php\"><button>Exit</button></a></p>";
echo "<p><a href=\"report.html\"><button>Another Incident</button></a></p>";
?>
</body>
</html>