<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>
   <link rel="stylesheet" href="../CSS/about.css">
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
   <body>

   <?php 
      require '../DB/dbConnect.php';
      include '../PHP/navbar.php';
   ?>

      <h1>About Us</h1>
      <h4>We strive to offer the best services</h4><br>
      <p>The Makhanda Gateway is local municipality service provider located in Makhanda, South Africa.</p>
      <p>Makhanda Gateway provides the Makhanda community with various kinds of local services, from infrastructural maintenance, 
         sewage and sanitation management, road maintenance and animal control. <br>The main aim of the Makhanda Gateway is to make sure that we provide profesional and efficient services to our local citizens.
         The Makhanda community is divided into 14 wards and in each ward we <br>have designated a warden to help us keep track of residential incidents.</p><br>

      <h4>Meet the team</h4>

      <div>
         <p>Caitlin</p>
         <img class=about-profile-img src="../Images/Caitlin.jpg" alt="Image of Caitlin">
      </div>

      <div>
         <p>Megan</p>
      <img class=about-profile-img src="../Images/Megs.jpg" alt="Image of Megan">
      </div>

      <div>
         <p>Beng</p>
      <img class=about-profile-img src="../Images/Beng.jpg" alt="Image of Beng">
      </div>

      <div>
         <p>Dylan</p>
      <img class=about-profile-img src="../Images/Dylan.jpg" alt="Image of Dylan">
      </div>

      <div>
         <p>Micky</p>
         <img class=about-profile-img src="../Images/Micky.jpg" alt="Image of Micky">
      </div>


      <h4>Contact Us</h4>
      <button>Contact us here</button>

      <h4>Would you like to submit a report</h4>
      <button>Make a report</button>

   <?php include '../PHP/footer.php';?>

      <div>
         <p>&copy;2026 Makhanda Gateway-All rights reserved</p>
      </div>
   </body>
</html>