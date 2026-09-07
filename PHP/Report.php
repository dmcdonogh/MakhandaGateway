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
$member_id = $_SESSION['member_id'];
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

include 'dbConnect.php';

if ($_SERVER["SERVER_METHOD"] != "POST")
{
    die ("<br> INVALID REQUEST METHOD");
}

/*

Make sure to add the following to the sql ticket table

-- Ticket table
CREATE TABLE ticket (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    community_member_id INT NOT NULL,
    ward INT NOT NULL,
    muncipal_service VARCHAR(250) NOT NULL,
    incident_description VARCHAR(250) NOT NULL,
    incident_address VARCHAR(250) NOT NULL,
    date_filed DATETIME NOT NULL,
    picture VARCHAR(100),
    CONSTRAINT fk_community_member_id FOREIGN KEY (community_member_id) REFERENCES community_members()
    CONSTRAINT fk_councillor_id FOREIGN KEY () REFERENCES users(id)
);

*/

$date= trim($_POST["date"], isset($_POST["date"])):'';
$muncipal_service = trim($_POST["municipal_service"], isset($_POST["municipal_service"])):'';

$image= isset($_FILES['picture']['name']? $_FILES['picture']['name']:)
$destination="Images"/.$image;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

$address= trim($_POST["PhysAddress"], isset($_POST["PhysAddress"])):'';
$ward= trim($_POST["ward"], isset($_POST["ward"])):'';
$incident_description = trim($_POST["descsofincident"], isset($_POST[descsofincident])):'';

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
$sql1incident= ("INSERT INTO ticket (community_member_id, ward, muncipal_service, incident_description, incident_address, date_filed, picture) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt = $conn->prepare($sql1incident);
$stmt->bind_param("issssss", $member_id, $ward, $incident_description, $priority, $image, $address, $ward, $postal, $description);

if ($stmt === false)
    {
        die("Prepare failed: " . $conn->error);
    }

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
echo "<p><a href=\"home.html\"><button>Exit</button></a></p>";
echo "<p><a href=\"report.html\"><button>Another Incident</button></a></p>";
?>
</body>
</html>