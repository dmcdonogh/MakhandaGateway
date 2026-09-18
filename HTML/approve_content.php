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

    $sql = "SELECT community_noticeboard.*, community_noticeboard_photos.photo_path
        FROM community_noticeboard
        LEFT JOIN community_noticeboard_photos
        ON community_noticeboard.notice_id = community_noticeboard_photos.notice_id";

    $result = $conn->query($sql);

    if($result -> num_rows >0) 
        {
            echo "<p><h2>Community notices</h2></p>";
            echo "<center><table width = \"90%\" bgcolor = \"lightblue\"><tr bgcolor =\"orange\">
            <th>Notice ID</th>
            <th>User ID</th>
            <th>Notice Date</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th></tr>";
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    
    echo "<td>" . $row["notice_id"] . "</td>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . date("Y-m-d", strtotime($row["notice_date"])). "</td>";
    echo "<td>" . $row["notice_description"] . "</td>";

    if (!empty($row["photo_path"]))
    {
        echo "<td><img src='../Images/" . htmlspecialchars($row["photo_path"]) . "' width='150' alt='Notice image'></td>";
    }  
    else
    {
        echo "<td>No image</td>";
    }
        echo "<td>" . $row["status"] . "</td>";

    echo "<td>";
    
    echo "<a href='../PHP/approve.php?idnumber=" . $row["notice_id"] . "'>
            <button type='button'>Approve</button>
          </a>";

    echo "<form action='../PHP/delete.php' method='POST' style='display:inline;'>
            <input type='hidden' name='notice_id' value='" . $row["notice_id"] . "'>
            <button type='submit' onclick=\"return confirm('Are you sure you want to delete this notice?');\">
                Delete
            </button>
          </form>";

    echo "</td>";
    echo "</tr>";
}
            echo "</table></center>";
}
?>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

<?php
    include '../PHP/footer.php';
?>
</body>