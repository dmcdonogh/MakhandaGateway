<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Report Incident</title>
   <link rel="stylesheet" href="style.css">
</head>
 
<body>

<?php include '../PHP/navbar.php';?>

<form action="Report.php" METHOD="POST" enctype = "multipart/form-data">

 <table class="table" id="INCIDENT-table">
                <tr> <th colspan = "2"> <h3>Incident report form</h3></th></tr>
                
<tr><td>Date of Incident:<td>
   <td> <input type="date" name="date" value="" required></td></tr>

<tr><td>Type of Incident:</td></tr><tr><td>
<br><select class="form-select" id="incidenttype" name="incidenttype"> //drop down to select incident type
   <option>Incident Type</option>
   <option value="Electricity and Infrastructure">Electricity and Infrastructure</option>
   <option value="Fires and Floods">Fires and Floods</option>
   <option value="Governance and Financial Mismanagement">Governance and Financial Mismanagement</option>
   <option value="Roads and Public Works">Roads and Public Works</option>
   <option value="Stray Animals">Stray Animals</option>
   <option value="Unlawful Land Occupation">Unlawful Land Occupation</option>
   <option value="Waste and Environment">Waste and Environment</option>
   <option value="Water and Sanitation Crisis">Water and Sanitation Crisis</option>
</select> </td></tr>

<tr><td>Priority</td></tr>
<tr><td><select name="Priority" id="Priority" value="" required>
               <option value="Urgent">Urgent</option>
               <option value="High">High</option>
               <option value="Moderate">Moderate</option>
               <option value="Low">Low</option>
</select></td></tr>

<tr><td>Upload Image Evidence:</td></tr><tr><td>
<br><input type = "file" name = "picture" id="picture"> </td></tr>

<tr><td>PhysAddress</td></tr>
   <tr><td><textarea name="PhysAddress" value="" required></textarea><td><tr>
   
   <tr><td>Ward</td></tr><tr><td><Select id="ward" name="ward" required>
                    <option value="">Select Ward</option>
                    <option value="Ward 1">Ward 1</option>
                    <option value="Ward 2">Ward 2</option>
                    <option value="Ward 3">Ward 3</option>
                    <option value="Ward 4">Ward 4</option>
                    <option value="Ward 5">Ward 5</option>
                    <option value="Ward 6">Ward 6</option>
                    <option value="Ward 7">Ward 7</option>
                    <option value="Ward 8">Ward 8</option>
                    <option value="Ward 9">Ward 9</option>
                    <option value="Ward 10">Ward 10</option>
                    <option value="Ward 11">Ward 11</option>
                    <option value="Ward 12">Ward 12</option>
                    <option value="Ward 13">Ward 13</option>
                    <option value="Ward 14">Ward 14</option>
                    </Select></td></tr>
   <tr><td>Postal Code</td></tr><tr><td><input type="text" name="code" id="code"></td></tr>

   <tr><td>Description of Incident</td></tr><tr>
      <td><textarea name="decsofincident" value="" required></textarea></td></tr>


<tr><td><button type="submit">Save Record</button>
<button type="reset">Clear Form </button></td></tr>

  <?php include '../PHP/footer.php';?>

</form>
</body>
</html>

</body>
</html>