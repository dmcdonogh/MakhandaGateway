<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>
<h1>Admin Panel</h1>
<div class="admin-button-container">
    <button class="admin-button" onclick="window.location.href='manage_reports.php';" >Manage User Reports</button>
    <button class="admin-button" onclick="window.location.href='statistical_reports.php';" >Generate Statistical Reports</button>
    <button class="admin-button" onclick="window.location.href='manage_access.php';">Provide Feedback</button>
    <button class="admin-button" onclick="window.location.href= 'provide_feedback.php';">Manage User Access</button>
    <button id="backbutton">Back</button>
</div>

  <?php include '../PHP/footer.php';?>
 
<!-- <footer></footer>  -->
    
</body>
</html>