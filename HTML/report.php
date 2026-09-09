<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Report Incident</title>
   <link rel="stylesheet" href="../CSS/report.css"> --styling the report page
   <link rel="stylesheet" href="../CSS/form.css"> --for the form structure
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>
<h1>Report an Incident</h1>
<form action="../PHP/Report.php" method ="POST" enctype = "multipart/form-data">
   <fieldset>
<legend></legend>
   <table class="table" id="INCIDENT-table">
      <tr>
         <th colspan = "2">
            <h2>Incident report form</h2>
         </th>
      </tr>
                
<tr>
   <td><h4>Date of Incident:</h4>
   <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i><td>
   <td> <input type="date" name="date" value="" required></td>
</tr>

<tr>
   <td><h4>Type of Incident:</h4>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td>
</tr>
<tr><td><select class="form-select" id="incidenttype" name="incidenttype"> <!--drop down to select incident type-->
         <option>Incident Type</option>
         <option value="Electricity and Infrastructure">Electricity and Infrastructure</option>
         <option value="Fires and Floods">Fires and Floods</option>
         <option value="Governance and Financial Mismanagement">Governance and Financial Mismanagement</option>
         <option value="Roads and Public Works">Roads and Public Works</option>
         <option value="Stray Animals">Stray Animals</option>
         <option value="Unlawful Land Occupation">Unlawful Land Occupation</option>
         <option value="Waste and Environment">Waste and Environment</option>
         <option value="Water and Sanitation Crisis">Water and Sanitation Crisis</option>
      </select></td></tr>

<tr><td><h4>Upload Image Evidence:</h4></td></tr>

<tr><td><br><input type = "file" name = "picture" id="picture"> </td></tr>

<tr><td><h4>Location of Incident</h4></td></tr>
<tr><td><h6>Street</h6>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td></tr>
<tr><td><textarea name="Street Line 1" value="" required></textarea><td><tr>
   <tr><td><textarea name="Street Line 2" value="" required></textarea><td><tr>

   <tr><td><h6>City/ Town:</h6>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td></tr>
<tr><td><textarea name="e.g Makhanda" value="" required></textarea><td><tr>

   <tr><td><h6>Suburb:</h6>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td></tr>
<tr><td><textarea name="e.g Cradock Heights" value="" required></textarea><td><tr>
   
<tr><td><h6>Ward</h6>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td></tr>
<tr><td><Select id="ward" name="ward" required>
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

<tr><td><h6>Postal Code:</h6>
<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></td></tr>
<tr><td><textarea name="e.g " value="" required></textarea><td><tr>


   <tr><td><h4>Description of Incident</h4></td></tr>
   <tr><td><textarea name="descsofincident" value="" required></textarea></td></tr>

  <tr><td> <button class="report-button" id="report-button-submit" type="submit">Save Record</button></td></tr>
   <tr><td><button class="report-button" id="report-button-home" type="reset">Back to Home </button></td></tr>
   <tr><td><button class="report-button" id="report-button-clear" type="reset">Clear Form </button></td></tr>
   </fieldset>
</form>

<?php include '../PHP/footer.php';?>

</body>
</html>