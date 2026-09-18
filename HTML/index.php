<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gateway Homepage</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/index2.css">
    <script src="../JS/index.js" defer></script>
</head>
<body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
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

    <!-- Nav arrows -->
    <button class="slide-arrow prev" aria-label="Previous slide">&#10094;</button>
    <button class="slide-arrow next" aria-label="Next slide">&#10095;</button>

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
<div class="communityNoticeBoard">

<h1>Community Notice Board</h1>
<p>
<a class="weatherwidget-io" href="https://forecast7.com/en/n33d3126d53/grahamstown/" data-label_1="GRAHAMSTOWN" data-label_2="WEATHER" data-theme="original" >GRAHAMSTOWN WEATHER</a>
<script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</p>

<?php
$sql = "SELECT c.notice_id, c.notice_date, c.notice_description, p.photo_path 
        FROM community_noticeboard c 
        LEFT JOIN community_noticeboard_photos p ON c.notice_id = p.notice_id 
        ORDER BY c.notice_date DESC";

$result = $conn->query($sql);
$notices = $result->fetch_all(MYSQLI_ASSOC);
?>


<html>
    
    <style>
        
        .container { max-width: 500px; margin: 0 auto; }
        h2 {text-align: center; }
    
        
        /* Notice Board Display Grid */
        .board { display: grid; grid-template-columns: 1fr; gap: 20px; }
        .notice-card { background: #ffffff; border-left: 5px solid #3b82f6; padding: 15px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); width: 500px}
        .notice-card h3 { margin: 0 0 10px 0; color:  #516bb5; }
        .notice-card p { margin: 0 0 15px 0; line-height: 1.5; color: #000000; }
        .notice-time { font-size: 12px; color: #a0aec0; text-align: right; }
        .no-notices { text-align: center; color: #777; font-style: italic; }
    </style>

    <!-- Live Notice Board Display -->


<!-- Live Notice Board Display -->
<h2>Active Notices</h2>
<div class="board">
    <?php if (count($notices) > 0): ?>
        <?php foreach ($notices as $notice): ?>
            <div class="notice-card">
                <p><?php echo nl2br(htmlspecialchars($notice['notice_description'])); ?></p>
           <!-- Display image if it exists -->

           <?php if (!empty($notice['photo_path'])): ?>
                <div class="notice-image">
                    <img src="../Images/<?php echo htmlspecialchars($notice['photo_path']); ?>"
                        alt="Notice Image" style="max-width: 100%; height: auto; border-radius: 4px; margin-top: 10px;">           
            </div>

             <?php endif; ?>

            <div class="notice-time">
                    Posted on: <?php echo date("F j, Y", strtotime($notice['notice_date'])); ?>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-notices">No notices posted yet.</p>
    <?php endif; ?>
</div>



 <?php include '../PHP/footer.php';?>

</body>
</html>