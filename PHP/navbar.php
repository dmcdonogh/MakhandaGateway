<?php
    if (session_status() === PHP_SESSION_NONE) { //if there is no session in progress then start one
        session_start();
    }
?>

<link rel="stylesheet" href="../CSS/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<script src="../JS/navbar_member.js" defer></script>
<nav class="navbar" id="navbar">

      <article class="navbar-logo">
         <img class="logo-image" src="../Images/logo.png" alt="Makhanda Gateway Logo">
      </article>
 
      <article class="navbar-navlinks">
         <a href="../HTML/member.php">Home</a>
         <a href="../HTML/about.php">About Us</a>
         <a href="../HTML/contact.php">Contact Us</a>
         <a href="../HTML/report.php">Report</a>
         <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'System Administrator'): ?>
               <a href="../HTML/admin.php">Admin</a>
         <?php endif; ?>
      </article>


      <article class="navbar-profilelinks" id="navbar-profilelinks">
         <?php

            if (isset($_SESSION['user_id'])) {
               echo '<div class="hamburger" id="hamburger">';
               echo '<button type="button">';
               echo '<i class="fas fa-bars"></i>';
               echo '</button>';
               echo '<div id="dropdownMenu" class="dropdown-menu">';
               echo '<a href="../HTML/report.php">Report</a>';
               echo '<a href="../HTML/view_tickets.php">View Tickets</a>';
               echo '<a href="../HTML/update_user.php">Edit Details</a>';
               echo '<a href="../PHP/logout.php">Logout</a>';
               echo '</div>';
               echo '</div>';
            } 
            else {
               echo '<a href="../HTML/login.php">Sign In</a>';
               echo '<a href="../HTML/signup.php">Sign Up</a>';
               }
         ?>
      </article>
</nav>