<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
  <body>
  <h3>Insert your Email and your mother's maiden name</h3>
    <form action="../PHP/reset_password.php" method="POST">

    
        <label>Email:</label>
        <input type="email" name="email" value="" required> <br><br>

        <tr><td>Mother's maiden name:</td>
          <td><input type="text" name="maiden" value="" reqired></td>
      </tr>
        

        <button type="submit">Send Reset code</button> <br><br>
        
    </form>  

  <?php include '../PHP/footer.php';?>
<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>

  </body>
</html>