<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <title>Registration</title>
</head>
<?php
        include_once("db-config.php");
        $emailErr = $passwordErr = $strong_password_Err = $phoneErr = "";
        if (isset($_POST['register'])) {
            $fname  =   $_POST['fname'];
            $lname  =   $_POST['lname'];
            $email  =   $_POST['email'];
            $gender =   $_POST['gender'];
            $phone  =   $_POST['phone'];
            $password   =   $_POST['password'];
            $c_password =   $_POST['cnf-password'];

            $email_result = mysqli_query($mysqli, "select email_id from registration where email_id='$email'");
          
            $user_matched = mysqli_num_rows($email_result);
            
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid Email Format";
            }
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $strong_password_Err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }
            $pattern = '/^\d+(\.\d{2})?$/';
            if(!preg_match('/^[0-9]{10}+$/', $phone)){
                $phoneErr = "Contact Number must be of 10 Digit";
            }
            if($password != $c_password)
            {
                $passwordErr = "Password and Confirm Password are Different!!";
            }
            if(!$emailErr && !$strong_password_Err && !$phoneErr && !$passwordErr)
            {
                if ($user_matched > 0) 
                {
                        echo '<script>alert("User already exists with this email id")</script>';
                } else {
                    $result   = mysqli_query($mysqli, "INSERT INTO registration(fname, lname, email_id, gender, phone, user_password, user_role_id) VALUES('$fname', '$lname', '$email', '$gender', '$phone', '$password', 2)");
    
                    if ($result) {
                        echo '<script>alert("User Registered successfully.")</script>';
                        header("location: login.php");
                    } else {
                        echo '<script>alert("Registration error. Please try again!!")</script>';
                    }
                }
            }
           
        }    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>
<body>
<div class="login-form">    
    <form action="register.php" method="post" name="registration_form">
		<div class="avatar"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title">Register Yourself !!</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="error-msg"><?php echo $emailErr; ?></div>
        </div>
        <div class="form-group">
            <!--<select id="sex" name="gender" class="form-control browser-default custom-select">
                <option>-- Select Gender --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="unspesified">Unspecified</option>
            </select>-->
            <label> Select Gender :  &nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="radio" type="radio" id="male" name="gender" value="Male">
            <label class="radio" for="male">Male</label>
            <input class="radio" type="radio" id="female" name="gender" value="Female">
            <label class="radio" for="female">Female</label>
            <input class="radio" type="radio" id="undefined" name="gender" value="Undefined" checked>
            <label class="radio" for="undefined">Undefined</label>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Contact No." required>
            <div class="error-msg"><?php echo $phoneErr; ?></div>
        </div>
        <div class="form-group">
            <input type="Password" name="password" class="form-control" placeholder="Password" required>
            <div class="error-msg"><?php echo $strong_password_Err; ?></div>
        </div>
        <div class="form-group">
            <input type="Password" name="cnf-password" class="form-control" placeholder="Confirm Password" required>
            <div class="error-msg"><?php echo $passwordErr; ?></div>
        </div>
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="register" value="Registration"><br>
        <div class="text-center small"><b><u><a href="login.php">Back to LogIn</a></u></b></div>            
    </form>		
</div>
</body>

</html>