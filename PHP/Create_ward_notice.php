<?php

session_start();
require '../DB/dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST")
{
    die("INVALID REQUEST");
}

if (!isset($_SESSION['user_id']))
{
    header("Location: ../HTML/login.php");
    exit();
}



$date = ($_POST["date"] ?? '');
$text_content = trim($_POST["descsofincident"] ?? '');
$ward = trim($_POST["ward"] ?? '');
$status = "Pending";


if (empty($date))
{
    die("All required fields must be filled in.");
}


//optional images

$image = '';

if (!empty($_FILES['picture']['name']))
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExtensions))
    {
        die("Invalid file type. Only JPG, PNG, or GIF allowed.");
    }

    if ($_FILES['picture']['size'] > 5 * 1024 * 1024)
    {
        die("File too large. Maximum size is 5MB.");
    }

    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $image = uniqid('incident_', true) . '.' . $ext;
    $destination = "../Images/" . $image;

    if (!move_uploaded_file($_FILES['picture']['tmp_name'], $destination))
    {
        die("Failed to upload image.");
    }
}


// Create ticket in the database

$sql = "INSERT INTO ward_notices 
        (ward, content, image, date, status)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false)
{
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param( "issss", $ward, $text_content, $image, $date, $status);

if ($stmt->execute())
{
    echo "<h2>Incident successfully reported!</h2>";
    echo "Your reference number is: " . $stmt->insert_id;
} 
else
{
    die("Execute failed: " . $stmt->error);
}

$stmt->close();
$conn->close();

?>

<p>
    <a href="../HTML/index.php">
        <button>Exit</button>
    </a>
</p>

<p>
    <a href="../HTML/report.php">
        <button>Another Incident</button>
    </a>
</p>