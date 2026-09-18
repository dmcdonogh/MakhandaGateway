<link rel="stylesheet" href="../CSS/navbar_member.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<nav class="navbar" id="navbar">

    <article class="navbar-logo">
        <img class="logo-image" src="../Images/logo.png" alt="Makhanda Gateway Logo">
    </article> 

    <article class="navbar-navlinks"> 
        <a href="../HTML/member.php">Home</a>
        <a href="../HTML/about.php">About Us</a>
        <a href="../HTML/contact.php">Contact Us</a>
    </article>

    <div class="hamburger" id="hamburger">
        <button type="button">
            <i class="fas fa-bars"></i>
        </button>

        <div id="dropdownMenu" class="dropdown-menu">
            <a href="../HTML/report.php">Report</a>
            <a href="../HTML/view_tickets.php">View Tickets</a>
            <a href="../HTML/update_user.php">Edit Details</a>
            <a href="../PHP/logout.php">Logout</a>
        </div>
    </div>

</nav>