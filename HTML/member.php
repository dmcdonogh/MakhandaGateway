<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Homepage</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/index2.css">
    <script src="../JS/index.js" defer></script>
    <!-- <script src="../JS/navbar_member.js" defer></script> -->
</head>
<body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

   if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If there's no valid session, kick the user out immediately
if (empty($_SESSION['user_id'])) {
    header("Location: ../HTML/index.php");
    exit;
}

// Tell the browser never to cache this page at all
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
<!-- Interactive Banner Slideshow -->
<div class="banner-slider">
    <div class="slide active">
        <img src="../Images/backg.jpg" alt="Makhanda Gateway">
        <div class="slide-caption">
            <h2>Welcome to Makhanda Gateway</h2>
            <p>Connecting the community, one report at a time</p>
        </div>
    </div>

    <div class="slide">
        <img src="../Images/backg2.png" alt="Community">
        <div class="slide-caption">
            <h2>Your Voice Matters</h2>
            <p>Report incidents and help improve our town</p>
        </div>
    </div>

    <div class="slide">
        <img src="../Images/makhanda.png" alt="Makhanda">
        <div class="slide-caption">
            <h2>Building a Better Makhanda</h2>
            <p>Together we can make a difference</p>
        </div>
    </div>

    <div class="slide">
        <img src="../Images/church.jpg" alt="Church">
        <div class="slide-caption">
            <h2>Stay Informed</h2>
            <p>Track the latest reports in your area</p>
        </div>
    </div>

    <!-- Navigation arrows -->
    <button class="slide-arrow prev" aria-label="Previous slide">&#10094;</button>
    <button class="slide-arrow next" aria-label="Next slide">&#10095;</button>

    <!-- Dots -->
    <div class="slide-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
        <span class="dot" data-slide="3"></span>
    </div>
</div>
<div class="action-buttons">
    <a href="../HTML/about.php" class="btn btn-about">
        About Us
    </a>
    <a href="../HTML/summeries.php" class="btn btn-report">
         View Ward Summeries
    </a>
</div>
<h1>Latest Reports</h1>
<a class="weatherwidget-io" href="https://forecast7.com/en/n33d3126d53/grahamstown/" data-label_1="GRAHAMSTOWN" data-label_2="WEATHER" data-theme="original" >GRAHAMSTOWN WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

<h2>Incident type:</h2>
<h6>Roads and Public works</h6>
<div class="img-text-row">
    <div class="report-image">
        <img src="../Report Images/Potholes.png" alt="potholes">
    </div>
    <div class="report-text">    
        <p><b>Area:</b>Russel Street</p> 
        <p><b>Issue:</b>There are multiple potholes throughout Russel street. They have gotten worse since it has been raining these past 2 weeks</p>
    </div>
</div>

<h2>Incident type:</h2>
<h6>Electricity and Infrustructure</h6>
<div class="img-text-row">
    <div class="report-image">
        <img src="../Report Images/lights.png" alt="lights image">
    </div>
    <div class="report-text">   
        <p><b>Area:</b>Montangue Street</p> 
        <p><b>Issue:</b>There are 2 street lamps that are broken. The luminaire part of the street light is hanging off and their electric wires are exposed and </p>
    </div>
</div>



 <?php include '../PHP/footer.php';?>
 
</body>
</html>