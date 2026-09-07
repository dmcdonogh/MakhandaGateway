<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>

       <?php include '../PHP/navbar.php';?>

        <form class="form" id="signup-form" action = "signup.php" method = "POST">
            <table class="table" id="signup-table">
                <tr> <th colspan = "2"> <h3>COMPLETE USER REGISTRATION FORM</h3></th></tr>
                
                <tr><td>FIRST NAME</td><td><input type = "text" name = "firstname" maxlength = "50" size = "20" value = "" required></td></tr>
                <tr><td>SURNAME</td> <td><input type = "text" name = "surname" maxlength = "50" size = "20" value = "" required></td></tr>

                <tr><td>USER ROLE </td> <td>
                    <select id = "userrole" name = "userrole" required>
                        <option value = "">Select role</option>
                        <option value = "System Administrator">System Administrator</option>
                        <option value = "Ward Councillor">Ward Councillor</option>
                        <option value = "Municipal Officer">Municipal Officer</option>
                        <option value = "Community Member">Community Member</option>
                    </select></td></tr>

                <tr id = ward-option><td>WARD</td><td>
                        <Select id="ward" name="ward">
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

                <tr><td>PHYSICAL ADDRESS</td> <td><textarea rows = "4" cols = "20" name = "physAddress"></textarea></td></tr>
                <tr><td>PHONE NUMBER</td> <td><input type = "text" name = "phone" maxlength = "14" size = "20" value = "" required></td></tr>
                <tr><td>EMAIL ADDRESS</td> <td><input type = "text" name = "email" maxlength = "50" size = "20" value = "" required></td></tr>
                <tr><td>USER NAME</td> <td><input type = "text" name = "username" maxlength = "50" size = "20" value = "" required></td></tr>
                <tr><td>PASSWORD</td> <td><input type = "password" name = "pword" maxlength = "200" size = "20" value = "" required> </td></tr>

                <tr><td><input type = "submit" value= "    Create User    "></td> <td><input type = "reset" value = "    Clear form    "></td>
            </table>
        </form>
          <?php include '../PHP/footer.php';?>
        
    </body>
</html>