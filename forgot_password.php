<!DOCTYPE html>
<html>
<?php
            session_start();
            include_once("db-config.php");
            $emailErr = "";
            if (isset($_POST['forgot_password'])) {
                
                $user_email = $_POST['email'];
            
                $token1 = bin2hex(random_bytes(8));
                $token2 = random_bytes(32);
                $hashedtoken = password_hash($token2, PASSWORD_DEFAULT);
                $url = "localhost//Activity_Booking/new_password.php?token1=". $token1 . "&token2=" . bin2hex($token2);
                $expire_token = date("U") + 1800;
                $_SESSION["token1"] = $token1;
                $_SESSION["token2"] = $token2;
                $check_email_query = "select * from registration where email_id = '$user_email'";
                
                $result = mysqli_query($mysqli, $check_email_query);
                
                if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
                {
                    $emailErr = "Invalid Email Format";
                } 
                
                else if(mysqli_num_rows($result) <= 0)
                {    
                    echo '<script>alert("'.$user_email.' is not registered ")</script>';
                }
                else{
                    $query = "delete from password_reset where password_reset_email = '$user_email'";
                    mysqli_query($mysqli, $query) or die( mysqli_error($mysqli));

                    mysqli_query($mysqli, "insert into password_reset (password_reset_email, password_reset_token1, password_reset_token2, password_reset_expires) VALUES ('$user_email', '$token1', '$hashedtoken', '$expire_token')");

                    
                    $to_email = "vekariakomal001@gmail.com";
                    $subject = "Simple Email Test via PHP";
                    $body = "Hi,nn This is test email send by PHP Script";
                    $headers = "From: sender\'s email";

                    if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                    } else {
                    echo "Email sending failed...";
                    }
                    /*$to = $user_email;

                    $subject = "Reset Your Password For Unwind Activities";
                   
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= "From: Admin <vekariakomal001@gmail.com>\r\n";
    
                    $message = "<p>We received a password reset request for ". $user_email . ".</p><p>The link to reset your password is below.</p>";
                    $message .= "<p><b>Here is your password reset link : </b></p>";
                    $message .= '<a href = "' . $url . '">' . $url . '</a>';
                    mail($to, $subject, $message, $headers);
                    header("Location: forgot_password.php?reset=success");*/
                }

               
            }
        ?>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>

<body>
<div class="login-form">    
    <form action="forgot_password.php" method="post" name="forgot_password_form">
		<div class="avatar"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title">Forgot Your Password !!</h4>
        <div class="form-group">
            <div class="text-center small">An e-mail will be send to you with instructions on how to reset your password. !!</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Enter Your E-mail Address.." required="required">
            <div class="error-msg"><?php echo $emailErr; ?></div>
        </div>
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="forgot_password" value="Forgot Password"><br>
        <div class="text-center small"><b><u><a href="login.php">Back to LogIn</a></u></b></div>  
        
    </form>	
    <?php
    	if(isset($_GET["reset"])){
            if($_GET["reset"] == "success"){
                echo '<div class="text-center small">Check Your E-mail.</div>';
            }
        }	
    ?>
</div>
</body>

</html>