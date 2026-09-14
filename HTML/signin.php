<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">

        <title>Login Form</title>
        <link rel="stylesheet" href="../CSS/signin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>

        <h3> LOGIN FORM </h3>
        <form action = "../PHP/login.php" method = "POST" autocomplete = "off">

            <label for="username">Username:</label>
        <input type="text" id="username" name="username" maxlength="35"
               placeholder="Enter username" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="35"
               placeholder="Enter password" autocomplete="current-password" required>

        <p><button type="submit">Login</button></p>
        <p><button onclick="window.location.href= 'signup.php';">Sign up</button></p>
         <p><a href="forgot_password.php">Forgot password?</a></p>

        </form>
        
      <?php include '../PHP/footer.php';?>
    </body>
</html>