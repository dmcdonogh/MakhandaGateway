<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate statistical reports</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
]);

  var options = {
      title: 'My Daily Activities'
};

var chart = new google.visualization.PieChart(document.getElementById('piechart'));

chart.draw(data, options);
}
 
</script>
</head>


<body>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>



<?php 
require '../DB/dbConnect.php'; 
include '../PHP/navbar.php'; 

//Get data for the Table
$sql = "SELECT * FROM ticket"; 
$result = $conn->query($sql); 

if ($result === FALSE) { 
    die("<p class='error'>Unable to retrieve data</p>"); 
} 

// Display Table
echo "<table width='80%' border='0' style='margin-bottom: 50px;'>"; 
echo "<tr style='background-color: #428bca; color: white;'> 
        <td>Ticket ID</td> 
        <td>Community Member ID</td> 
        <td>Ward</td> 
        <td>Type of Issue</td> 
        <td>Date Filed</td> 
      </tr>"; 

while ($row = $result->fetch_assoc()) { 
    echo "<tr>"; 
    echo "<td>" . $row['ticket_id'] . "</td>"; 
    echo "<td>" . $row['community_member_id'] . "</td>"; 
    echo "<td>" . $row['ward'] . "</td>"; 
    echo "<td>" . $row['municipal_service'] . "</td>"; 
    echo "<td>" . $row['date_filed'] . "</td>"; 
    echo "</tr>"; 
} 
echo "</table>"; 

if(isset($_REQUEST['submit'])) {
  $reportChosen = $_REQUEST['report'];

  
}
?>

    

</body>
</html>
