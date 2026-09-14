<?php

include "../DB/dbConnect.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]): '';
        $surname = isset($_POST["surname"]) ? trim($_POST["surname"]): '';
        $userrole = isset($_POST["userrole"]) ? trim($_POST["userrole"]): '';
        $ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : ''; 
        $email = isset($_POST["email"]) ? filter_var($email,FILTER_VALIDATE_EMAIL) ? trim(htmlspecialchars($_POST["email"])): '';
        $pword = isset($_POST["pword"]) ? $_POST["pword"] : '';
        $hash_pword = !empty($pword) ? password_hash($pword, PASSWORD_DEFAULT): '';
        
        if ($userrole === "Community Member")
        {
            $account_status = "active";
        } 
        else
        {
            $account_status = "pending";
        }

        //check if the user has a deactive account and reactivate with new password and info

        $stmt = $conn->prepare("INSERT INTO users(first_name, last_name, role, ward, email, password, status)
                                VALUES(?,?,?,?,?,?,?)");
        
        if ($stmt === false)
        {
            die("Prepare failed: " . $conn->error);
        }

        $stmt -> bind_param("sssisss", $firstname, $surname, $userrole, $ward, $email, $hash_pword, $account_status);

        if($stmt->execute())
            {
                echo "Record for " . $firstname . " " . $surname . " successfully created. <br><br>";
                echo "<a href = ../HTML/signin.php> Go to Login page</a>";
            }

             else
            {
                die("<a href = ../HTML/signup.php> Back to Signup</a><br>". 
                "Record could not be created: " . $conn->error);
            }
       
                $stmt->close();
                $conn->close();
    }

?>