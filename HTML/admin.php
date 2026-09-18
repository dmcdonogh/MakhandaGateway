<?php 

    require '../DB/dbConnect.php';
    if (session_status() === PHP_SESSION_NONE) { //if there is no session in progress then start one
    session_start();
}

// If there's no valid login session, the user will be removed immediately
// You are not able to see the stuff in the page of you are not login
if (empty($_SESSION['user_id']) || $_SESSION['role'] !== 'System Administrator') {
    header("Location: ../HTML/index.php");
    exit;
}


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // Tell the browser to not keep cache about this page at all
header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php
    include '../PHP/navbar.php';
?>

<h1>System Administrator Panel</h1>
<div class="admin-button-container">
    <!-- <button class="admin-button" onclick="window.location.href='manage_reports.php';" >Manage User Reports</button> -->
    <button class="admin-button" onclick="window.location.href='statistical_reports.php';" >Generate Statistical Reports</button>
    <!-- <button class="admin-button" onclick="window.location.href='provide_feedback.php';">Provide Feedback</button> -->
    <button class="admin-button" onclick="window.location.href='manage_access.php';">Manage User Access</button>
    <button class="admin-button" onclick="window.location.href='approve_content.php';">Approve Notices</button>
    
</div>

  <?php include '../PHP/footer.php';?>
 
    
</body>
</html> 