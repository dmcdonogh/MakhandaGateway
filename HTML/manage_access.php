<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Access</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/manage_access.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';

 $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if($result -> num_rows >0) 
        {
            echo "<p><h2>All Users</h2></p>";
            echo "<center><table width = \"90%\" bgcolor = \"lightblue\"<tr bgcolor =\"orange\">
            <th>User ID</th>
            <th>First name</th>
            <th>Surname</th>
            <th>Email address</th>
            <th>Ward</th>
            <th>Role</th>
            <th>Status</th>
            <th>Update</th></tr>"; 

            while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["user_id"] ."</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] .
                         "</td><td>" . $row["email"] . "</td><td>" . $row["ward"] . "</td><td>" . $row["role"] .
                         "</td><td>" . $row["status"] . "</td><td>" .

                         "<a href = \"admin_update_user.php?idnumber=" .$row["user_id"] . "\"><button>Update</button></a>" .
                         "</td></tr>";
                }

            echo "</table></center>";
}
?>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>
<?php
 include '../PHP/footer.php';

?>
</body>
</html>