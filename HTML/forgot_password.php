<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <body>
<?php 
   require '../DB/dbConnect.php';
//    include '../PHP/navbar.php';

if($_SERVER[REQUEST_METHOD]==='POST') {
    $email=trim($_POST['email']);
}

$stmt= $conn->prepare("SELECT id FROM users WHERE email= ?");
$stmt->bind_param("s", $email);
$stmt->execute();
?>

<form action="forgot_password.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Send Reset code</button>
</form>  
</body>
</html>