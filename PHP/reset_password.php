<?php 
if(session_status() === "POST_SESSION_NONE") {
    session_start();
}
include '../PHP/navbar.php';
require '../DB/dbConnect.php'; 

$mysqli = ConnectDB();           // Call the function, store the returned mysqli object

function ConnectDB() {

    $server   = 'is3-dev.ict.ru.ac.za';  //  DB host
    $user     = 'G23M3169';              //  DB username
    $password = 'McdDyl21!';             //  DB password
    $dbname   = 'thegateway5';           //  DB name to connect to

    $mysqli = new mysqli($server, $user, $password, $dbname);  // Create the connection object

    if ($mysqli->connect_error) {                               // Check if connection failed
        die("connection failed. try again" . $mysqli->connect_error);  // Stop script, show error
    }

    return $mysqli;   // Send the working connection object back to whoever called ConnectDB()
}

if($_SERVER['REQUEST_METHOD']!=='POST' || empty($_POST['email']) || empty($_POST['maiden'])) {
    die ('email and your mothers maiden name are required');
} 
$email=trim($_POST['email']);
$security=trim($_POST['maiden']);

$sql1= "SELECT user_id, email, security FROM users WHERE email=? AND security= ?";
$stmt1= $mysqli->prepare($sql1);
if (!$stmt1) {
    die ('prepared failed'. $mysqli->error);
}
$stmt1->bind_param("ss", $email, $security);
// var_dump($email, $security);
$stmt1->execute();
$result=$stmt1->get_result();
$user=$result->fetch_assoc();

if (!$user) {
    die("Information entered has failed to be identified. Try again!");
}

if($_SERVER("REQUEST_METHOD") === "POST") {

$user= isset($_POST['user_id']) ? trim($_POST['user_id']): '';
$password= isset($_POST['pword']) ? trim($_POST['pword']): '';
$hash_password= !empty('pword') ? password_hash($password, PASSWORD_DEFAULT): ''; 

$sqli_update= "UPDATE users SET password=? WHERE user_id=?";

$stmt= $mysqli->prepare($sqli_update);

if($stmt === FALSE) {
    die("prepare failed" . $mysqli->error);
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
}

?>
    <form action="../PHP/update_password" method="POST">

        <tr>
            <td>Password:</td>
            <td><?php<input type="password" name="pword" maxlength="60" size="20" value=" " required></td>
        </tr> <br><br>
        
        <tr>
            <td>Confirm Pasword:</td>
            <td><input type="password" name="pword" maxlength="60" size="20" value=" " required></td>
        </tr>
        <tr>
            <td><input type="submit" value="Update"></td>
        </tr>
        
    </form>
</body>
</html>