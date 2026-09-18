<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account details</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/update_user.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../DB/dbConnect.php';
include '../PHP/navbar.php';

// If there's no valid login session, kick the user out immediately
if (empty($_SESSION['user_id'])) {
    header("Location: ../HTML/index.php");
    exit;
}

// Tell the browser not to cache this page at all
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$user_Id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstname = isset($_POST["first_name"]) ? trim($_POST["first_name"]) : '';
    $surname = isset($_POST["last_name"]) ? trim($_POST["last_name"]) : '';
    $ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';

    $sql_update = "UPDATE users SET last_name = ?, first_name = ?, email = ?, ward = ? 
                   WHERE user_id = ?";

    $stmt = $conn->prepare($sql_update);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $surname, $firstname, $email, $ward, $user_Id);

    if ($stmt->execute())
    {
        $stmt->close();
        header("Location: update_user.php");
        exit;
    }
    
    else
    {
        echo "<script>alert('Record update failed. Please retry.');</script>";
        $stmt->close();
    }
}

// Fetch the current row to populate the form
$sql_select = "SELECT * FROM users WHERE user_id = ?";

$stmt = $conn->prepare($sql_select);
$stmt->bind_param("s", $user_Id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: User not found.");
}

$row2 = $result->fetch_assoc();
$stmt->close();

?>

<form action="" method="POST">
    <table bgcolor="" width="30%">
        <tr><th colspan="2">
            <h3>USER UPDATE FORM</h3>
        </th></tr>

        <tr>
            <td>FIRSTNAME</td>
            <td><input type="text" name="first_name" maxlength="35" size="20"
                        value="<?php echo htmlspecialchars($row2['first_name']); ?>" required></td>
        </tr>

        <tr>
            <td>SURNAME</td>
            <td><input type="text" name="last_name" maxlength="35" size="20"
                        value="<?php echo htmlspecialchars($row2['last_name']); ?>" required></td>
        </tr>

        <tr>
            <td>WARD</td>
            <td>
                <select name="ward" required>
                    <option value="1" <?php if ($row2['ward'] == '1') echo 'selected'; ?>>
                        Ward 1
                    </option>

                    <option value="2" <?php if ($row2['ward'] == '2') echo 'selected'; ?>>
                        Ward 2
                    </option>

                    <option value="3" <?php if ($row2['ward'] == '3') echo 'selected'; ?>>
                        Ward 3
                    </option>

                    <option value="4" <?php if ($row2['ward'] == '4') echo 'selected'; ?>>
                        Ward 4
                    </option>

                    <option value="5" <?php if ($row2['ward'] == '5') echo 'selected'; ?>>
                        Ward 5
                    </option>

                    <option value="6" <?php if ($row2['ward'] == '6') echo 'selected'; ?>>
                        Ward 6
                    </option>

                    <option value="7" <?php if ($row2['ward'] == '7') echo 'selected'; ?>>
                        Ward 7
                    </option>

                    <option value="8" <?php if ($row2['ward'] == '8') echo 'selected'; ?>>
                        Ward 8
                    </option>

                    <option value="9" <?php if ($row2['ward'] == '9') echo 'selected'; ?>>
                        Ward 9
                    </option>

                    <option value="10" <?php if ($row2['ward'] == '10') echo 'selected'; ?>>
                        Ward 10
                    </option>

                    <option value="11" <?php if ($row2['ward'] == '11') echo 'selected'; ?>>
                        Ward 11
                    </option>

                    <option value="12" <?php if ($row2['ward'] == '12') echo 'selected'; ?>>
                        Ward 12
                    </option>

                    <option value="13" <?php if ($row2['ward'] == '13') echo 'selected'; ?>>
                        Ward 13
                    </option>

                    <option value="14" <?php if ($row2['ward'] == '14') echo 'selected'; ?>>
                        Ward 14
                    </option>

                </select>
            </td>
        </tr>

        <tr>
            <td>EMAIL ADDRESS</td>
            <td><input type="email" name="email" maxlength="35" size="20"
                        value="<?php echo htmlspecialchars($row2['email']); ?>" required></td>
        </tr>

        <tr>
            <td><input type="submit" value="    Update user    "></td>
            <td><button type="button" onclick="window.location.href='../HTML/member.php'">Home</button></td>
        </tr>
    </table>
</form>
<!-- 
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button> -->

</body>
</html>