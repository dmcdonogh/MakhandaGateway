<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">

        <title>Login Form</title>
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/login.css">
        <link rel="stylesheet" href="../CSS/forms.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
<?php 
   require '../DB/dbConnect.php';
   include '../PHP/navbar.php';
?>

<main class="login-page">
    <div class="login-card">
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Please sign in to your account</p>

        <?php if (!empty($_GET['error'])): ?>
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_GET['success'])): ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php endif; ?>

        <form action="../PHP/login.php" method="POST" class="login-form" novalidate>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-icon">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="email" name="email" maxlength="35"
                           placeholder="Enter email address" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                
                <div class="input-icon">
                    <i class="fa-solid fa-lock"></i>
                    
                    <input type="password" id="password" name="password" maxlength="35"
                    placeholder="Enter password" autocomplete="current-password" required>
                    
                    <button type="button" class="toggle-password" aria-label="Show password">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    </div>
            </div>

            <div class="form-row">
                <label class="remember">
                    <input type="checkbox" name="remember" value="1">
                    <span>Remember me</span>
                </label>
                <a href="forgot_password.php" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <p class="signup-text">
                Don't have an account?
                <a href="signup.php">Sign up</a>
            </p>
        </form>

        <form class="form" id="signup-form" action = "../PHP/signup.php" method = "POST">
            <table class="table" id="signup-table">
                <tr>
                    <th colspan = "2">
                        <h2>COMPLETE USER REGISTRATION FORM</h2>
                    </th>
                </tr>

                <tr>
                    <td><h4>NAME:</h4></td>
                    <td>
                        <input type = "text" placeholder="Name" name = "firstname" maxlength = "50" size = "20" value = "" required>
                    </td>
                </tr>
                
                <tr>
                    <td><h4>SURNAME:</h4></td>
                    <td>
                        <input type = "text" placeholder="Surname" name = "surname" maxlength = "50" size = "20" value = "" required>
                    </td>
                </tr>

                <tr>
                    <td><h4>USER ROLE:</h4></td>
                    <td>
                        <select class="signup-dropdown" id="signup-userrole" name="userrole" required>
                            <option value="">Select Role:</option>
                            <option value="System Administrator">System Administrator</option>
                            <option value="Ward Councillor">Ward Councillor</option>
                            <option value="Municipal Officer">Municipal Officer</option>
                            <option value="Community Member">Community Member</option>
                        </select>
                    </td>
                </tr>
                
                <tr class="signup-ward-dropdown" id="signup-ward-option" style="display:none">
                    <td>
                        <h4>WARD:</h4>
                    </td>
                    <td>
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

                <tr>
                    <td><h4>PHONE NUMBER:</h4></td>
                    <td>
                        <input type = "text" name = "phone" maxlength = "14" size = "20" value = "" required>
                    </td>
                </tr>

                <tr>
                    <td><h4>EMAIL ADDRESS:</h4></td>
                    <td>
                        <input type = "text" name = "email" maxlength = "50" size = "20" value = "" required>
                    </td>
                </tr>
                
                <tr>
                    <td><h4>PASSWORD:</h4></td>
                    <td>
                        <input type = "password" name = "pword" maxlength = "200" size = "20" value = "" required>
                    </td>
                </tr>

                <tr>
                    <td><h4>YOUR MOTHER'S MAIDEN NAME:</h4></td>
                    <td>
                        <input type="text" name="maiden" maxlength="60" size="20" value="" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <button type = "submit" class= "Create-button">Create User</button>
                    </td>
                    <td>
                        <button type = "reset" class= "Clear-button">Clear form</button>
                    </td>
                </tr>
            </table>
        </form>
        
    </div>
</main>

<script>
    // Toggle password visibility
    document.querySelector('.toggle-password')?.addEventListener('click', function () {
        const pw = document.getElementById('password');
        const icon = this.querySelector('i');
        if (pw.type === 'password') {
            pw.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            pw.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
</script>
 <!--<button type="button" class="GoBack-button" onclick="history.back()">Go Back</button>-->
      <?php include '../PHP/footer.php';?>
    </body>
</html>