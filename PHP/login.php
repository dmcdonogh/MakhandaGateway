<?php
    require '../DB/dbConnect.php'; //copies all the code from the file to this section

    if (session_status() === PHP_SESSION_NONE) { //if there is no session in progress then start one
        session_start();
    }

    //check request method for security
    if($_SERVER['REQUEST_METHOD'] !=='POST') {
        die('Invalid request method');
    }

    // Check if both fields exist
    if(isset($_POST['email']) && isset($_POST['password'])) {
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
    $email = trim($_POST['email']);

    //log trails
    $comment1 = "Falied login";
    $comment2 = "Successful login";
    $timestamp = date("Y-m-d H:i:s");
    $reason1 = "Username not found";
    $reason2 = "Used valid login detials";
    $reason3 = "User wrong password";

    //preventing sql injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0){
        // $sqllogt1 = "INSERT INTO logtrails (email, comment, attempttime, reason) 
        // VALUES (?,?,?,?)";
        // $stmt1 = $conn->prepare($sqllogt1);
        // $stmt1->bind_param("ssss", $email, $comment1, $timestamp, $reason1);
        // $stmt1->execute();
        header('location: ../HTML/login.php');
        exit();
        } else {
            //fetch record if user exists
            $row = $result->fetch_assoc();
            
            $_SESSION['role'] = $row['role'];

            // Check if account is active
            if ($row['status'] !== 'active')
            {
                echo "<script>
                window.location.href = '../HTML/login.php';
                alert('Your account is not active yet. Please wait for your account to be approved.');
                </script>";
                exit();
            }
        }

        //verify pword
        if(password_verify($password, $row['password'])){

            session_regenerate_id(true);

            $_SESSION['user_id'] = $row['user_id'];
            
            switch($row['role']) {
                
                case "System Administrator":
                    header("Location: ../HTML/admin.php");
                    $_SESSION['role'] = $row['role'];
                exit();

            case "Ward Councillor":
                header("Location: ../HTML/councillor.php");
                exit();

            case "Community Member":
                header("Location: ../HTML/member.php");
                exit();

            case "Municipal Officer":
                header("Location: ../HTML/officer.php");
                exit();

            default:
                die("Access level not recognized.");
        }
    }
        // else
        // {
        //     echo "<script>alert('Incorrect email address or password.');</script>" 
        // }
    

    $conn->close();
?> 