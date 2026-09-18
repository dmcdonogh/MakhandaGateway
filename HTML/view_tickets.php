<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/manage_access.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../DB/dbConnect.php';
include '../PHP/navbar.php';


/* Check that the user is logged in */

if (empty($_SESSION['user_id'])) {
    header("Location: ../HTML/index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
echo "Logged in user ID: " . $user_id;

/* Get only this user's reported tickets and their photos */

$sql = "SELECT ticket.*,
               GROUP_CONCAT(photo.photo_path SEPARATOR '|') AS photos
        FROM ticket
        LEFT JOIN photo
        ON ticket.ticket_id = photo.ticket_id
        WHERE ticket.user_id = ?
        GROUP BY ticket.ticket_id";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $user_id);
$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0)
{
    echo "<p><h2>My Reported Tickets</h2></p>";

    echo "<center><table width=\"95%\" bgcolor=\"lightblue\">
          <tr bgcolor=\"orange\">
          <th>Ward</th>
          <th>Municipal Service</th>
          <th>Date Filed</th>
          <th>Street</th>
          <th>City</th>
          <th>Suburb</th>
          <th>Postal Code</th>
          <th>Description</th>
          <th>Photos</th>
          <th>Status</th>
          <th>Comment</th>
          </tr>";


    while($row = $result->fetch_assoc())
{
    echo "<tr>
            <td>" . $row["ward"] . "</td>
            <td>" . $row["municipal_service"] . "</td>
            <td>" . date("Y-m-d", strtotime($row["date_filed"])) . "</td>
            <td>" . $row["street"] . "</td>
            <td>" . $row["city"] . "</td>
            <td>" . $row["suburb"] . "</td>
            <td>" . $row["postal_code"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>";

    /* Display photos */

    $photo_sql = "SELECT photo_path FROM photo WHERE ticket_id = ?";
    $photo_stmt = $conn->prepare($photo_sql);

    if ($photo_stmt === false)
    {
        die("Prepare failed: " . $conn->error);
    }

    $photo_stmt->bind_param("i", $row["ticket_id"]);
    $photo_stmt->execute();
    $photo_result = $photo_stmt->get_result();

    if ($photo_result->num_rows > 0)
    {
        while ($photo = $photo_result->fetch_assoc())
        {
            echo "<img src=\"../Report Images/" .
                 htmlspecialchars($photo["photo_path"]) .
                 "\" width=\"100\" height=\"100\"
                 style=\"object-fit: cover; margin: 5px;\"
                 alt=\"Ticket photo\">";
        }
    }
    else
    {
        echo "No photos";
    }

    $photo_stmt->close();

    echo "</td>
          <td>" . $row["status"] . "</td>
          <td>" . $row["comment"] . "</td>
          </tr>";
}


    echo "</table></center>";
}
else
{
    echo "<h2>You have no reported tickets to edit.</h2>";
}

$stmt->close();

?>

<br>

<button type="button" class="GoBack-button" onclick="history.back()">
    Go Back
</button>

<?php
include '../PHP/footer.php';
?>

</body>
</html>