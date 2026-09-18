<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account details</title>
    <link rel="stylesheet" href="../CSS/style.css">
   <!-- <link rel="stylesheet" href="../CSS/forms.css">-->
    <link rel="stylesheet" href="../CSS/manage_report_update2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

if (!isset($_GET['ticketnumber']) || empty($_GET['ticketnumber']))
{
    die("Error: No ticket provided.");
}

$ticket_id = $_GET['ticketnumber'];

$sql_select = "SELECT 
            ticket_id, 
            user_id, 
            ward, 
            municipal_service, 
            date_filed, 
            status,
            comment, 
            CONCAT(street, ' ', suburb, ' ', city) AS address 
            FROM ticket
            WHERE ticket_id = ?";

$stmt = $conn->prepare($sql_select);
$stmt->bind_param("i", $ticket_id);
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
    $ticket_id = isset($_POST["ticket_id"]) ? trim($_POST["ticket_id"]) : 0;
    $user_id = isset($_POST["user_id"]) ? trim($_POST["user_id"]) : '';
    $ward = isset($_POST["ward"]) ? trim($_POST["ward"]) : '';
    $service = isset($_POST["municipal_service"]) ? trim($_POST["municipal_service"]) : '';
    $address = isset($_POST["address"]) ? trim($_POST["address"]) : '';
    $date = isset($_POST["date_filed"]) ? trim($_POST["date_filed"]) : '';
    $status = isset($_POST["status"]) ? trim($_POST["status"]) : '';
    $comment = isset($_POST['comment']) ? trim($_POST["comment"]): '';

    $sql_update = "UPDATE ticket SET municipal_service = ?, status = ?, ward = ?, comment =?
                   WHERE ticket_id = ?";

    $stmt = $conn->prepare($sql_update);

    if (!$stmt)
    {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $service, $status, $ward,  $comment, $ticket_id);

    if ($stmt->execute())
    {
        $stmt->close();
        $conn->close();

        header("Location: manage_reports.php");
        exit();
    }
    else
    {
        echo "Record update failed: " . $stmt->error;
    }
}
?>
<form action = "" method = "POST">
    <table bgcolor = "" width = 30%>
        <tr><th colspan = "2">
            <h3>Edit Ticket</h3>
        </th></tr>

        <tr>
            <td>Ticket ID</td> 
            <td><input type = "text" name = "ticket_id" maxlength = "35" size = "20"
                        value = "<?php echo $row2['ticket_id'];?>" readonly></td>
        </tr>

        <tr>
            <td>User ID</td> 
            <td><input type = "text" name = "user_id" maxlength = "35" size = "20"
                        value = "<?php echo $row2['user_id'];?>" readonly></td>
        </tr>

        <tr>
            <td>Ward</td> 
            <td>
                <input type = "text" name = "ward" maxlength = "10" size = "20"
                        value = "<?php echo $row2['ward'];?>" readonly></td>
            </td>
        </tr>

        <tr>
            <td>Municipal Service</td> 
            <td>
                <input type = "text" name = "municipal_service" maxlength = "10" size = "20"
                        value = "<?php echo $row2['municipal_service'];?>" readonly></td>
            </td>
        </tr>

             <tr>
            <td>Address </td> 
            <td><input type = "text" name = "address" maxlength = "10" size = "20"
                        value = "<?php echo $row2['address'];?>" readonly></td>
        </tr>

         <tr>
            <td>Date </td> 
            <td><input type = "text" name = "date_filed" maxlength = "10" size = "20"
                        value = "<?php echo $row2['date_filed'];?>" readonly></td>
        </tr>

        <tr>
            <td>Comment</td>
            <td><textarea name="comment" maxlength="255" rows="5" cols="22" required>
                <?php echo htmlspecialchars($row2['comment']); ?></textarea>
            </td>

        </tr>

        <tr>
            <td>Status</td> 
                <td><select name="status" required>
                    <option value="Reported" <?php if ($row2['status'] == 'Reported') echo 'selected'; ?>>
                        Reported
                    </option>

                    <option value="Pending" <?php if ($row2['status'] == 'Pending') echo 'selected'; ?>>
                        Pending
                    </option>

                    <option value="Complete" <?php if ($row2['status'] == 'Complete') echo 'selected'; ?>>
                        Complete
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td><input type = "submit" value = "    Update user    "></td>
            <td><button type="button" class="clear-button" onclick="this.form.reset()">Clear Form</button></td>
        </tr>
    </table>
</form>

<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>
<?php include '../PHP/footer.php';?>
</body>
</html>