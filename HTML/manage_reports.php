<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Reports</title>
    <link rel="stylesheet" href="../CSS/style.css">
   <link rel="stylesheet" href="../CSS/manage_reports2.css">
    <link rel="stylesheet" href="../CSS/admin_update_user.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<!--  
//ticket is automatically given 'reported' status. We can change it to 'working on it!' or 'complete'
 -->

<?php 
require '../DB/dbConnect.php';
include '../PHP/navbar.php';

$sql = "SELECT 
            ticket_id, 
            user_id, 
            ward, 
            municipal_service, 
            date_filed, 
            status,
            comment, 
            CONCAT(street, ' ', suburb, ' ', city) AS address
        FROM ticket";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if($result -> num_rows >0) 
        {
            
            echo "<center><table width = \"90%\" bgcolor = \"lightblue\">
            <th>Ticket ID</th>
            <th>User ID</th>
            <th>Ward</th>
            <th>Service</th>
            <th>Address</th>
            <th>Date</th>
            <th>Status</th>
            <th>Comment</th>
            <th>Update</th></tr>";

            while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["ticket_id"] ."</td><td>" . $row["user_id"] . "</td><td>" . $row["ward"] .
                         "</td><td>" . $row["municipal_service"] . "</td><td>" . $row["address"] . "</td><td>" . $row["date_filed"] .
                         "</td><td>" . $row["status"] . "</td><td>" . $row["comment"] . "</td><td>" .

                         "<a href = \"manage_report_update.php?ticketnumber=" .$row["ticket_id"] . "\"><button>Update</button></a>" .
                         "</td></tr>";
                }

    echo "</table>";

} else {
    echo "<h2>No records found.</h2>";
}

?>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

 <?php include '../PHP/footer.php';?>

</body>
</html>