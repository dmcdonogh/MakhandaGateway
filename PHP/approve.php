<?php

require '../DB/dbConnect.php';

if (!isset($_GET['idnumber']) || empty($_GET['idnumber']))
{
    die("No notice ID provided.");
}

$notice_id = $_GET['idnumber'];

$sql = "UPDATE community_noticeboard 
        SET status = 'Approved'
        WHERE notice_id = ?";

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
    echo "Update failed: " . $stmt->error;
}

?>