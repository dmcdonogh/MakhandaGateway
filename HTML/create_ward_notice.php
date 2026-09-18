<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ward Notice</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/report.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
 
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>

<h1>Create Ward Notice</h1>
<p><h3>Ward Notices are posters, notices and announcements that go out to users that live in the relevent ward</h3></p>

<form action="../PHP/Create_ward_notice.php" method ="POST" enctype = "multipart/form-data">
 <table class="table" id="INCIDENT-table">
      <tr>
         <th colspan = "2">
            <h2>Ward Notice</h2>
         </th></tr>
 
         <tr>
   <td><h4>Date of Publication: <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
   <input type="date" name="date" value="" required></td>
</tr>

<tr><td><h4>WARD:<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
         <select id="ward" name="ward">
               <option value="">Select Ward</option>
               <option value="1">Ward 1</option>
               <option value="2">Ward 2</option>
               <option value="3">Ward 3</option>
               <option value="4">Ward 4</option>
               <option value="5">Ward 5</option>
               <option value="6">Ward 6</option>
               <option value="7">Ward 7</option>
               <option value="8">Ward 8</option>
               <option value="9">Ward 9</option>
               <option value="10">Ward 10</option>
               <option value="11">Ward 11</option>
               <option value="12">Ward 12</option>
               <option value="13">Ward 13</option>
               <option value="14">Ward 14</option>
         </select>
      </td>
   </tr>

         <tr><td><h4>Written Notice</h4>
   <textarea name="descsofincident"></textarea></td></tr>

         <tr><td><h4>Upload Image/Poster</h4>
<input type = "file" name = "picture" id="picture"></td></tr>

<tr><td> <button type= "Submit" class="report-button">Submit Ticket</button></td></tr>
<tr><td><button  type= "reset" class="report-button">Clear Form </button></td></tr>

</table>
</form>

<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

  <?php include '../PHP/footer.php';?>
    
</body>
</html>