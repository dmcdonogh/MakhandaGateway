<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Report Incident</title>
   <link rel="stylesheet" href="../CSS/report2.css"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
         </th></tr>
                
<tr>
   <td><h4>Date of Incident <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
   <input type="date" name="date" value="" required></td>
</tr>

<tr><td><h4>Type of Incident <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
<select class="form-select" id="incidenttype" name="incidenttype"><!--drop down to select incident type-->
         <option value="">Incident Type</option>
         <option value="Electricity and Infrastructure">Electricity and Infrastructure</option>
         <option value="Fires and Floods">Fires and Floods</option>
         <option value="Governance and Financial Mismanagement">Governance and Financial Mismanagement</option>
         <option value="Roads and Public Works">Roads and Public Works</option>
         <option value="Stray Animals">Stray Animals</option>
         <option value="Unlawful Land Occupation">Unlawful Land Occupation</option>
         <option value="Waste and Environment">Waste and Environment</option>
         <option value="Water and Sanitation Crisis">Water and Sanitation Crisis</option>
      </select></td></tr>

<tr><td><h4>Upload Image Evidence</h4>
<input type = "file" name = "picture" id="picture"></td></tr>

<tr><td><h4>Location of Incident<i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h4>
<h5>Street</h5>
<textarea name="Street1" placeholder= "Street 1"required></textarea></td></tr>
   <tr><td><textarea name="Street2" placeholder= "Street 2"required></textarea></td></tr>

   <tr><td><h5>City/ Town <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h5>
   <textarea name="City" placeholder= "e.g Makhanda" required></textarea></td></tr>

   <tr><td><h5>Suburb</h5>
<textarea name="Suburb" placeholder= "e.g Cradock Heights" required></textarea></td></tr>
   
<tr><td><h5>Ward <i class="fas fa-asterisk" style="font-size:15px;color:red;"></i></h5>
<Select id="ward" name="ward" required>
                    <option value="">Select Ward</option>
                    <option value="Ward 1">1</option>
                    <option value="Ward 2">2</option>
                    <option value="Ward 3">3</option>
                    <option value="Ward 4">4</option>
                    <option value="Ward 5">5</option>
                    <option value="Ward 6">6</option>
                    <option value="Ward 7">7</option>
                    <option value="Ward 8">8</option>
                    <option value="Ward 9">9</option>
                    <option value="Ward 10">10</option>
                    <option value="Ward 11">11</option>
                    <option value="Ward 12">12</option>
                    <option value="Ward 13">13</option>
                    <option value="Ward 14">14</option>
                    </Select></td></tr>

<tr><td><h5>Postal Code</h5>
<textarea name="postalcode" placeholder= "e.g 6139"required></textarea></td></tr>

   <tr><td><h4>Description of Incident</h4>
   <textarea name="descsofincident" value="" required></textarea></td></tr>

  <tr><td> <button type= "Submit" class="report-button">Save Record</button></td></tr>
   <tr><td><button  type= "button" class="report-button">Back to Home </button></td></tr>
   <tr><td><button  type= "reset" class="report-button">Clear Form </button></td></tr>
</table>
   </fieldset>
</form>

<?php include '../PHP/footer.php';?>

</body>
</html>