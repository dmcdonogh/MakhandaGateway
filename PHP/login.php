<?php

session_start();

require '../DB/dbConnect.php'; //copies all the code from the file to this section

//check request method for security
if($_SERVER['REQUEST_METHOD'] !=='POST') {
    die('Invalid request method');
}

//Check if both fields exist
if(isset($_POST['email']) && isset($_POST['password]'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
} else {
    die('Email and Password are required');
}

//validate input
if (empty($email) || empty($password)) {
    die('Email and Password cannot be empty');
}

//clean email
$email = preg_replace('/[a-zA-Z0-9_\-]/','', $email);

//log trails
$comment1 = "Falied login";
$comment2 = "Successful login";
$timestamp = date("Y-m-d H:i:s");
$reason1 = "Username not found";
$reason2 = "Used valid login detials";
$reason3 = "User wrong password";

//preventing sql injection
$sql = "SELECT * FROM systemusers WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result + $stmt->getresult();

if ($result->num_rows === 0){
    $sqllogt1 = "INSERT INTO logtrails (email, comment, attempttime, reason) VALUES (?,?,?,?)";
    $stmt1 = $conn->prepare($sqllogt1);
    $stmt1->bind_param("ssss", $email, $comment1, $timestamp, $reason1);
    $stmt1->execute();

    header('location: signin.html');
    exit();
    } else {

    //fetch record if users exists
    $row = $result->fetch_assoc();

    //verify pword
    if(password_verify($password, $row['password'])){
        session_regenerate_id(true);

        //prepared statement for successful login log
        $sqllogt = "INSERT INTO logtrails (email, comment, attempttime, reason) VALUES (?,?,?,?)";
        $stmt2 = $conn->prepare($sqllogt);
        $stmt2->bind_param("ssss", $uname, $comment2, $timestamp, $reason2);
        $stmt2->execute();

        //display welcome message
        echo"<p>Welcome " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . " you are " . htmlspecialchars($row['user_role']) . "</p>"; 

        //directing to relevent page
        switch($row['userrole']) {

        case "Administrator":
            //code
            break;

        case "Councillor":
            //code
            break;

        case "Resident";
            //code
            break;

        case "Officer";
            //code
            break;

        default: 
            echo "<p>Access level not recognized. Please contact administrator,</p>";
            echo "<p><a href=\"sign.html\"><button>Back to Login</button></a></p>";
            break;
        }
    } else {
        //Password incorrect 
        //Use prepared statement for failed login log
        $sqllogt1 = "INSERT INTO logtrails (username, comment, attempttime,reason) VALUES (?,?,?,?)";
        $stmt1 = $conn->prepare($sqllogt1);
        $stmt1->bind_param("ssss", $uname, $comment1, $timestamp, $reason3);
        $stmt1->execute();

        echo "<p>Login failed. Invalid password.</p>";
        echo "<p><a href=\"signin.html\"><button>Back to Login</button></a></p>";
        exit();
    }   
}

$conn->close();
?> 