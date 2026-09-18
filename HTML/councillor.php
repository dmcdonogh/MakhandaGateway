<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ward councillor page</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

   if (session_status() === PHP_SESSION_NONE) { //if there is no session in progress then start one
    session_start();
}

// If there's no valid login session, the user will be removed immediately
// You are not able to see the stuff in the page of you are not login
if (empty($_SESSION['user_id'])) {
    header("Location: ../HTML/index.php");
    exit;
}

// Tell the browser to not keep cache about this page at all
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

?>
<h1>Ward Councillor Panel</h1>
<div class="admin-button-container">
    <button class="admin-button" onclick="window.location.href='report.php';" >Create Ticket</button>
    <button class="admin-button" onclick="window.location.href='manage_reports.php';" >Manage User Reports</button>
    <button class="admin-button" onclick="window.location.href='create_ward_summary.php';">Generate Ward Summary</button>
    <button class="admin-button" onclick="window.location.href='statistical_reports.php';">View Ticket Statistics</button>
    
</div>


  <?php include '../PHP/footer.php';?>
 
</body>
</html>