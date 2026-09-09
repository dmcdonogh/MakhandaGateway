<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway Homepage</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>
<!-- download pic  -->
<!-- <img src="makhanda.png" alt="Picture of Makhanda">   -->

<h1>Latest Reports</h1>
<!-- pic from the db -->
<!-- <img src="Street_lights.png" alt="Street lights off pic">  -->

<h2>Incident type</h2>
<p><b>Area:</b>xxxxxxxxxxx</p><br>  
<p><b>Time:</b> xxxx a brief description of the reported incident</p><br>


<!-- pic from the db -->
<!-- <img src="Fixing Poteholes.png" alt="Fixing the pipes pic">  -->
<h2>Incident type</h2>
<!-- an example from our db -->
<p><b>Area:</b>xxxxxxxxxxx</p><br>  
<p><b>Time:</b> xxxx a brief description of the reported incident</p><br>

 <?php include '../PHP/footer.php';?>

</body>
</html>