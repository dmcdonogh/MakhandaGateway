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

// Get values
$user_id = $_SESSION['user_id'];
$text_content = trim($_POST["descsofincident"] ?? '');
$date = trim($_POST["date"] ?? '');
$status = "Pending";

if (empty($date) || empty($text_content))
{
    die("All required fields must be filled in.");
}

// 1. Insert the notice into the main table first (without image)
$sql = "INSERT INTO community_noticeboard 
        (user_id, notice_date, notice_description, status)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false)
{
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("isss", $user_id, $date, $text_content, $status);

if(!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}

// Get the auto-generated notice_id for the photo relationship
$notice_id = $stmt->insert_id;
$stmt->close();


// 2. Handle Single Image Upload (if provided)
$imageUploaded = false;

if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) 
{
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading the image.");
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB limit

    $originalName = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExtensions)) {
        die("Invalid file type: $originalName. Only JPG, PNG, or GIF allowed.");
    }

    if ($size > $maxSize) {
        die("File too large: $originalName. Maximum size is 5MB.");
    }

    $imageName = uniqid('notice_', true) . '.' . $ext;
    $destination = "../Images/" . $imageName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
        die("Failed to move uploaded image.");
    }

    // 3. Insert the photo record into community_noticeboard_photos
    $photoSql = "INSERT INTO community_noticeboard_photos (notice_id, photo_path) VALUES (?, ?)";
    $photoStmt = $conn->prepare($photoSql);

    if ($photoStmt === false) {
        die("Photo prepare failed: " . $conn->error);
    }

    // Assuming photo_path stores just the filename or the full relative path ($imageName or $destination)
    $photoStmt->bind_param("is", $notice_id, $imageName);

    if (!$photoStmt->execute()) {
        die("Photo insertion failed: " . $photoStmt->error);
    }

    $photoStmt->close();
    $imageUploaded = true;
}

$conn->close();

?>

<h2>Incident successfully reported!</h2>
<p>Your reference number is: <?php echo $notice_id; ?></p>
<?php if ($imageUploaded): ?>
    <p>Image successfully uploaded and attached.</p>
<?php endif; ?>

<p>
    <a href="../HTML/officer.php">
        <button>Exit</button>
    </a>
</p>

<p>
    <a href="../HTML/create_community_notice.php">
        <button>Add another notice</button>
    </a>
</p>