<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../CSS/navbar.css">
   <title>Navbar</title>
   
</head>
<body>
   <!-- NAVBAR -->
   <nav class="navbar" id="navbar">

      <!-- LOGO -->
      <article class="navbar-logo" id="navbar-logo">
            <img class="logo-image" id="navbar-logo-image" src="../Images/logo_icon.png" alt="Makhanda Gateway Logo">
      </article>

      <!-- NAVBAR BUTTONS -->
       <article class="navbar-navlinks" id="navbar-navlinks">
         <a href="../HTML/index.php">Home</a>
         <a href="../HTML/report.php">Report</a>
         <a href="../HTML/about.php">About Us</a>
         <a href="../HTML/contact.php">Contact Us</a>
         <a href="../HTML/admin.php">Admin Panel</a>
         <!--  <?php if ($role === 'admin'): ?>
               <a href="administrator.php">Admin</a>
               <?php endif; ?>
            -->
       </article>

       <article class="navbar-profilelinks" id="navbar-profilelinks">
         <a href="../HTML/signin.php">Sign In</a>
         <a href="../HTML/signup.php">Sign Up</a>
       </article>


   </nav>
</body>
</html>