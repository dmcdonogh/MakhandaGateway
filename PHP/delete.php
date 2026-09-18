<?php

require '../DB/dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST")
{
    die("Invalid request.");
}

$notice_id = isset($_POST["notice_id"]) ? trim($_POST["notice_id"]) : '';

if (empty($notice_id))
{
    die("No notice ID provided.");
}

/* Delete photo */
$sql_photo = "DELETE FROM community_noticeboard_photos WHERE notice_id = ?";

$stmt = $conn->prepare($sql_photo);
$stmt->bind_param("i", $notice_id);
$stmt->execute();
$stmt->close();

/* Delete notice */
$sql = "DELETE FROM community_noticeboard WHERE notice_id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt)
{
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $notice_id);

if ($stmt->execute())
{
    $stmt->close();
    $conn->close();

    header("Location: ../HTML/approve_content.php");
    exit();
}
else
{
    echo "Delete failed: " . $stmt->error;
}

?>