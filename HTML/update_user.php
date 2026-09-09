<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account details</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

// if (!isset($_GET['user_id']) || empty($_GET['user_id']))
// {
//     die("Error: No user ID provided.");
// }

$user_Id = 1; //$_GET['user_id'];

$sql_select = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql_select);
$stmt->bind_param("s", $user_Id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0)
{
    die("Error: User not found.");
}
$row2 = $result->fetch_assoc();
$stmt->close();

echo "User = " . $row2['email'] . " extracted from database using query<br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize all inputs
    
    $idnumber = isset($_POST["user_id"]) ? trim($_POST["user_id"]) : '';
    $firstname = isset($_POST["first_name"]) ? trim($_POST["first_name"]): '';
    $surname = isset($_POST["last_name"]) ? trim($_POST["last_name"]): '';
    $ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : '';
    $email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])): '';
    
    //user_id hard coded for testing - change it back
    $sql_update = "UPDATE users SET last_name = '$surname', first_name = '$firstname',
                    email = '$email', ward = '$ward' WHERE user_id = '1'";

        $query_execute = $conn -> query($sql_update);

        if($query_execute)
        {
            $conn->close();
            header("Location:update_user.php");
        }
        else
        {
            echo "<script>alert('Record could update failed. Retry')</script>";
        }
    }

?>
<form action = "" method = "POST">
    <table bgcolor = "" width = 30%>
        <tr><th colspan = "2">
            <h3>USER UPDATE FORM </h3>
        </th></tr>

        <tr>
            <td>FIRSTNAME </td> 
            <td><input type = "text" name = "first_name" maxlength = "35" size = "20"
                        value = "<?php echo $row2['first_name'];?>" required></td>
        </tr>

        <tr>
            <td>SURNAME </td> 
            <td><input type = "text" name = "last_name" maxlength = "35" size = "20"
                        value = "<?php echo $row2['last_name'];?>" required></td>
        </tr>

        <tr>
            <td>WARD </td> 
            <td><input type = "text" name = "ward" maxlength = "10" size = "15"
                        value = "<?php echo $row2['ward'];?>" required></td>
        </tr>

        <tr>
            <td>EMAIL ADDRESS </td> 
            <td><input type = "email" name = "email" maxlength = "35" size = "20"
                        value = "<?php echo $row2['email'];?>" required></td>
        </tr>

        <tr>
            <td><input type = "submit" value = "    Update user    "></td>
            <td><input type = "reset" value = "    Clear form    "></td>
        </tr>
    </table>
</form>
</body>