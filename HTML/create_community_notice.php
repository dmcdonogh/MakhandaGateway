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

<h1>Create Community Notice</h1>
<h3>Community Notices are posters, notices and announcements that go out to all users and visitors of the webpage</h3>

<form action="../PHP/Create_community_notice.php" method ="POST" enctype = "multipart/form-data">
 <table class="table" id="INCIDENT-table">
      <tr>
         <th colspan = "2">
            <h2>Community Notice</h2>
         </th></tr>

      <tr>
            <td><h4>Date of Publication: <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
            <input type="date" name="date" value="" required></td>
      </tr>

         <tr><td><h4>Notice text</h4>
   <textarea name="descsofincident"></textarea></td></tr>

         <tr><td><h4>Upload Image/Poster</h4>
    <input type="file" name="image" id="image" accept="image/*"></td>
</tr>
 
<tr><td> <button type= "submit" class="report-button">Submit Notice</button></td></tr>
<tr><td><button  type= "reset" class="report-button">Clear Form </button></td></tr>

</table>
</form>

<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

  <?php include '../PHP/footer.php';?>
     
</body>
</html>