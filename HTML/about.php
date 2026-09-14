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

      <div class="team-member">
         <p>Caitlin</p>
         <img class=about-profile-img src="../Images/Caitlin.jpg" alt="Image of Caitlin">
      </div>

      <div class="team-member">
         <p>Megan</p>
      <img class=about-profile-img src="../Images/Megs.jpg" alt="Image of Megan">
      </div>

      <div class="team-member">
         <p>Beng</p>
      <img class=about-profile-img src="../Images/Beng.jpg" alt="Image of Beng">
      </div>

      <div class="team-member">
         <p>Dylan</p>
      <img class=about-profile-img src="../Images/Dylan.jpg" alt="Image of Dylan">
      </div>

      <div class="team-member">
         <p>Micky</p>
         <img class=about-profile-img src="../Images/Micky.jpg" alt="Image of Micky">
      </div>

<div class="button-row">
   <div class="button item">
      <h4>Contact Us</h4>
      <a href="contact.php"><button>Contact us here</button></a>
</div>

   <div class="button item">
      <h4>Would you like to submit a report</h4>
      <a href="report.php"><button>Make a report</button></a>
</div></div>

   <?php include '../PHP/footer.php';?>

      <div class="copyright">
         <p>&copy;2026 Makhanda Gateway-All rights reserved</p>
      </div>
   </body>
</html>