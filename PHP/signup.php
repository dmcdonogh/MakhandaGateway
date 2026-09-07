<?php

include "dbconnection.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]): '';
        $surname = isset($_POST["surname"]) ? trim($_POST["surname"]): '';
        $userrole = isset($_POST["userrole"]) ? trim($_POST["userrole"]): '';

        //only if community member or ward councillor are selected, they can choose a ward
        if ($userrole == "Ward Councillor" || "Community Member")
        {
            $ward = isset($POST["ward"]) ? trim($_POST["ward"]): ''
        }

        $phone = isset($_POST["phone"]) ? trim($_POST["phone"]): '';
        $email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])): '';
        $pword = isset($_POST["pword"]) ? $_POST["pword"] : '';
        $hash_pword = !empty($pword) ? password_hash($pword, PASSWORD_DEFAULT): '';
        
        $stmt = $conn->prepare("INSERT INTO User(fname, lname, role, ward, phone, email, password)
                                VALUES(?,?,?,?,?,?,?,?,?,?)");
        
        $stmt -> bind_param("isssssssss", $firstname, $surname, $userrole, $ward, $phone, $email, $hash_pword);

        if($stmt->execute())
            {
                echo "Record for " . $firstname . " " . $surname . " successfully created. <br><br>";
                echo "<a href = \"login.html\">Go to Login page</a>";
            }

             else
            {
                die("<a href = \"signup.html\">Back to Signup</a><br>". 
                "Record could not be created: " . $conn->error);
            }
       
                $stmt->close();
                $conn->close();
    }

?>