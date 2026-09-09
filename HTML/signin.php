<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "wdth+device-width, initial-scale = 1.0">

        <title>Login Form</title>
        <link rel="stylesheet" href="../CSS/signin.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>

        <h2> LOGIN FORM </h2>
        <form action = "../PHP/login.php" method = "POST" autocomplete = "off">

            <label>USER NAME: <input type = "text" name = "username" maxlength = "35" size = "20" placeholder = "enter username" required></label>
            <br><br>
            <label>PASSWORD: <input type = "password" name = "password" maxlength = "35" size = "20" placeholder = "enter password" required></label>

            <p><button type = "submit">LOGIN</button></p>
            <p><a href = "forgottenPasswordForm.html"><button type = "button">Forgot password</button></a></p>
            <p><a href = "signup.html"><button type = "button">Signup</button></a></p>
            
        </form>
        
      <?php include '../PHP/footer.php';?>
    </body>
</html>