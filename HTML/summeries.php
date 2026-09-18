<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Ward Summeries</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/index2.css">
    <script src="../index.js"></script>
</head>
<body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

   $sql = "SELECT ward_id, ward_councillor_id, total_tickets, resolved_tickets, pending_tickets FROM ward_summary";
    $result = $conn->query($sql);

    if (!$result) {
    die("Database query failed: " . $conn->error);
}


    if($result -> num_rows > 0) 

        {
            echo "<p><h2> Ward Summaries </h2></p>";
            echo "<center><table width = \"90%\" bgcolor = \"lightblue\"<tr bgcolor =\"orange\">
            <th>Ward</th>
            <th>Ward Councillor</th>
            <th>Total Tickets</th>
            <th>Complete Tickets</th>
            <th>Tickets being worked on</th>";

            while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["ward_id"] ."</td><td>" . $row["ward_councillor_id"] . "</td><td>" . $row["total_tickets"] .
                         "</td><td>" . $row["resolved_tickets"] . "</td><td>" . $row["pending_tickets"] . "</td><td>";
                }

            echo "</table></center>";
}
?>

<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

 <?php include '../PHP/footer.php';?>

</body>
</html>