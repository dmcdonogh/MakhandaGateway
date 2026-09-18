<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/contact.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?> 

   <h1>Contact Us</h1>
   <h3>Customer Care line</h3>
   <p>+27 (0) 46 603 6134</p>
   <h3>Address</h3>
   <p>City Hall, High str, Grahamstown, 6139</p>
   <h3>Postal</h3>
   <p>P.O Box 176 Grahamstown, 6140</p>

<h2>Makhanda Municipality Ward Maps</h2>
<p class="wardMaps">
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%201.pdf">Ward 1</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%202.pdf">Ward 2</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%203.pdf">Ward 3</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%204.pdf">Ward 4</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%205.pdf">Ward 5</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%206.pdf">Ward 6</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%207.pdf">Ward 7</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%208.pdf">Ward 8</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%209.pdf">Ward 9</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%2010.pdf">Ward 10</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%2011.pdf">Ward 11</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%2012.pdf">Ward 12</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%2013.pdf">Ward 13</a><br>
<a href="https://www.makana.gov.za/wp-content/uploads/2013/wardmaps/EC104_Ward%2014.pdf">Ward 14</a><br>
</p>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

 <?php include '../PHP/footer.php';?>
</body>
</html>