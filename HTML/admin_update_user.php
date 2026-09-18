<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account details</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/forms.css">

    <link rel="stylesheet" href="../CSS/report.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

if (!isset($_GET['idnumber']) || empty($_GET['idnumber']))
{
    die("Error: No user ID provided.");
}

$user_Id = $_GET['idnumber'];

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

// echo "User = " . $row2['email'] . " extracted from database using query<br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $firstname = isset($_POST["first_name"]) ? trim($_POST["first_name"]) : '';
    $surname = isset($_POST["last_name"]) ? trim($_POST["last_name"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : '';
    $role = isset($_POST["role"]) ? trim($_POST["role"]) : '';
    $status = isset($_POST["status"]) ? trim($_POST["status"]) : '';

    $sql_update = "UPDATE users SET role = ?, status = ? 
                   WHERE user_id = ?";

    $stmt = $conn->prepare($sql_update);

    if (!$stmt)
    {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssi", $role, $status, $user_Id);

    if ($stmt->execute())
    {
        $stmt->close();
        $conn->close();

        header("Location: manage_access.php");
        exit();
    }
    else
    {
        echo "Record update failed: " . $stmt->error;
    }
}
?>
    <form action = "" method = "POST" class="update-user-form">
        <table bgcolor = "" width = 30%>
            <tr><th colspan = "2">
                <h3>USER UPDATE FORM </h3>
            </th></tr>

            <tr>
                <td><h4>FIRSTNAME:</h4></td> 
                <td><input type = "text" name = "first_name" maxlength = "35" size = "20"
                            value = "<?php echo $row2['first_name'];?>" readonly></td>
            </tr>

            <tr>
                <td><h4>SURNAME:</h4></td> 
                <td><input type = "text" name = "last_name" maxlength = "35" size = "20"
                            value = "<?php echo $row2['last_name'];?>" readonly></td>
            </tr>

            <tr>
                <td><h4>WARD:</h4></td> 
                <td><input type = "text" name = "ward" maxlength = "10" size = "15"
                            value = "<?php echo $row2['ward'];?>" readonly></td>
            </tr>

            <tr>
                <td><h4>EMAIL ADDRESS:</h4></td> 
                <td><input type = "email" name = "email" maxlength = "35" size = "20"
                            value = "<?php echo $row2['email'];?>" readonly></td>
            </tr>

            <tr>
                <td><h4>ROLE:</h4></td> 
                    <td>
                        <select name="role" required>
                            <option value="System Administrator" <?php if ($row2['role'] == 'System Administrator') echo 'selected'; ?>>
                                System Administrator
                            </option>

                            <option value="Ward Councillor" <?php if ($row2['role'] == 'Ward Councillor') echo 'selected'; ?>>
                                Ward Councillor
                            </option>

                            <option value="Municipal Officer" <?php if ($row2['role'] == 'Municipal Officer') echo 'selected'; ?>>
                                Municipal Officer
                            </option>

                            <option value="Community Member" <?php if ($row2['role'] == 'Community Member') echo 'selected'; ?>>
                                Community Member
                            </option>
                        </select>
                </td>
            </tr>

            <tr>
                <td><h4>STATUS:</h4></td> 
                    <td><select name="status" required>
                        <option value="active" <?php if ($row2['status'] == 'active') echo 'selected'; ?>>
                            Active
                        </option>

                        <option value="pending" <?php if ($row2['status'] == 'pending') echo 'selected'; ?>>
                            Pending
                        </option>

                        <option value="inactive" <?php if ($row2['status'] == 'inactive') echo 'selected'; ?>>
                            Inactive
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><input type = "submit" value = "    Update user    "></td>
                <td><input type = "reset" value = "    Clear form    "></td>
            </tr>
        </table>
    </form>

    <article class="GoBack-wrapper">
        <button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>
    </article>
<?php include '../PHP/footer.php';?>
</body>
</html>