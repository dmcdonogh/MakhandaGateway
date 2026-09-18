<?php
Session_start();
include "../DB/dbConnect.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]): '';
        $surname = isset($_POST["surname"]) ? trim($_POST["surname"]): '';
        $userrole = isset($_POST["userrole"]) ? trim($_POST["userrole"]): '';
        $ward = isset($_POST["ward"]) ? (int)$_POST["ward"] : 0;
        $email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])) : '';
        $pword = isset($_POST["pword"]) ? $_POST["pword"] : '';
        $security= isset($_POST["maiden"]) ? trim($_POST["maiden"]): '';
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

        $stmt = $conn->prepare("INSERT INTO users(first_name, last_name, role, ward, email, password, status, security)
                                VALUES(?,?,?,?,?,?,?,?)");
        
        if ($stmt === false)
        {
            die("Prepare failed: " . $conn->error);
        }

        $stmt -> bind_param("sssissss", $firstname, $surname, $userrole, $ward, $email, $hash_pword, $account_status, $security);
        
        
        if ($stmt->execute()) {
            header("Location: ../HTML/login.php");
            exit();
            
        } else {

            $error = json_encode($stmt->error);

            echo "<script>
                alert(" . $error . ");
                window.location.href = '../HTML/signup.php';
            </script>";

            exit();
        }

        $stmt->close();
        $conn->close();
    }

?>