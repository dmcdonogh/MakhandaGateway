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

$user_id = $_SESSION['user_id'];

$date = trim($_POST["date"] ?? '');
$municipal_service = trim($_POST["incidenttype"] ?? '');
$ward = trim($_POST["ward"] ?? '');
$street1 = trim($_POST["Street1"] ?? '');
$street2 = trim($_POST["Street2"] ?? '');
$city = trim($_POST["City"] ?? '');
$suburb = trim($_POST["Suburb"] ?? '');
$postal_code = trim($_POST["postalcode"] ?? '');
$description = trim($_POST["descsofincident"] ?? '');

$street = trim("$street1 $street2");
$status = "Reported";

if (empty($date) || empty($municipal_service) || empty($ward) ||
    empty($street) || empty($city) || empty($description))
{
    die("All required fields must be filled in.");
}

// Create ticket in the database

$sql = "INSERT INTO ticket 
        (user_id, ward, municipal_service, date_filed, street, city, suburb, postal_code, description, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false)
{
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param( "iissssssss", $user_id, $ward, $municipal_service, $date, $street,
                    $city, $suburb, $postal_code, $description, $status);

if(!$stmt->execute()) { //Runs it, and it also tells us if the execution did not run
    die ("execution failed" .  $stmt->error);
}

// Get the auto-generated ticket_id that MySQL just created for this new ticket,
// so we can use it below to link any uploaded photos to this specific ticket
$ticket_id = $stmt->insert_id;
$stmt->close();


// This will count how many images were successfully uploaded
$uploadedCount = 0;

// Only try to process images if at least one file was actually selected
if (!empty($_FILES['images']['name'][0]))
{
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // File types we allow
    $maxSize = 5 * 1024 * 1024; // Maximum file size allowed: 5MB (in bytes)

    // Prepare one statement that we'll reuse for every image, instead of preparing it fresh each loop
    $photoStmt = $conn->prepare("INSERT INTO photo (ticket_id, photo_path) VALUES (?, ?)");

    // If that statement failed to prepare, stop and show the error
    if ($photoStmt === false)
    {
        die("Prepare failed: " . $conn->error);
    }

    // Loop through every file that was uploaded (there can be more than one)
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName)
    {
        $error = $_FILES['images']['error'][$index]; // Get the upload error code for this specific file

        // If this "slot" is empty (no file chosen here), skip it and move to the next
        if ($error === UPLOAD_ERR_NO_FILE)
        {
            continue;
        }

        // If there was some other upload error, stop and tell the user
        if ($error !== UPLOAD_ERR_OK)
        {
            die("Error uploading one of the images.");
        }

        $originalName = $_FILES['images']['name'][$index]; // The original filename from the user's computer
        $size = $_FILES['images']['size'][$index]; // The file size in bytes
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION)); // Get the file extension in lowercase (e.g. "png")

        // Reject the file if its extension isn't one we allow
        if (!in_array($ext, $allowedExtensions))
        {
            die("Invalid file type: $originalName. Only JPG, PNG, or GIF allowed.");
        }

        // Reject the file if it's bigger than our size limit
        if ($size > $maxSize)
        {
            die("File too large: $originalName. Maximum size is 5MB.");
        }

        // Create a new, unique filename so uploaded files never overwrite each other
        $imageName = uniqid('incident_', true) . '.' . $ext;
        $destination = "../Report Images/" . $imageName; // Where the file will actually be saved on the server

        // Move the uploaded file from its temporary location to its final destination
        if (!move_uploaded_file($tmpName, $destination))
        {
            die("Failed to upload image: $originalName.");
        }

        // Save a record in the photo table linking this image to the ticket
        $photoStmt->bind_param("is", $ticket_id, $imageName);

        if(!$photoStmt->execute()) {
            die ("photos failed to be inserted" . $photoStmt->error); 
        }
        $uploadedCount++; // Increase our count of successfully uploaded images
    }

    $photoStmt->close(); // Close the photo statement now that the loop is done
}



echo "<h2>Incident successfully reported!</h2>";
echo "Your reference number is: " . $ticket_id;
if ($uploadedCount > 0)
{
    echo "<p>$uploadedCount image(s) uploaded.</p>";
}
$conn->close();

?>

<p>
    <a href="../HTML/member.php">
        <button>Exit</button>
    </a>
</p>

<p>
    <a href="../HTML/report.php">
        <button>Another Incident</button>
    </a>
</p>