<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if(session_status() === POST_SESSION_NONE) {
    session_start();
}
require "../DB/dbconnect.php";

if($_SERVER(REQUEST_METHOD) ==== "POST");

$user= isset($_POST['user_id']) ? trim($_POST['user_id']): '';
$password= isset($_POST['pword']) ? trim($_POST['pword']): '';
$hash_password= !empty('pword') password_hash($password, PASSWORD_DEFAULT): ''; 

$sqli_update= "UPDATE users SET password=? WHERE user_id=?";

$stmt= $conn->prepare($sqli_update);

if($stmt === FALSE) {
    die ("prepare failed" $conn->error);
}

$stmt->bind_param("s", $hash_password);

if($stmt->execute()){
    $stmt->close();
    header("Location:../HTML/login.php");
    exit;
} else {
    echo "<script>alert(You failed to change your password. Try again);</script>";
    $stmt->close();
}


?>
    <form action="../PHP/update_password" method="POST">

        <tr>
            <td>Password:</td>
            <td><input type="password" name="pword" maxlength="60" size="20" value="<?php htmlspecialchars($row['password']);?>" required></td>
        </tr>
        
        <td><input type="submit" value="Update password"></td>
    </form>
</body>
</html>