<?php
session_start();
include_once("db-config.php");
$strong_password_Err = $passwordErr = "";

if (isset($_POST['reset_password'])) 
{    
    $token_selector = $_POST["token1"];
    $token_validator = $_POST["token2"];
    $new_password = $_POST["new_password"];
    $new_confirm_password = $_POST["new_confirm_password"];

    $curr_date = date("U");

    $check_email_query = "select * from password_reset where password_reset_token1 = '$token_selector' AND password_reset_expires >= '$curr_date'";
    $result = mysqli_query($mysqli, $check_email_query);  
    $row = mysqli_fetch_row($result);
   
    if($row > 0)
    {
        $tokentobinary = hex2bin($token_validator);
        $token_check = password_verify($tokentobinary, $row[3]);

        if($token_check === false)
        {
            echo '<script>alert("You need to reset your password again!!")</script>';
        }
        else if($token_check === true)
        {
            $reset_email = $row[1];
            
            $uppercase = preg_match('@[A-Z]@', $new_password);
            $lowercase = preg_match('@[a-z]@', $new_password);
            $number    = preg_match('@[0-9]@', $new_password);
            $specialChars = preg_match('@[^\w]@', $new_password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
                $strong_password_Err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                $strong_password_Err;
            }
            if($new_password != $new_confirm_password)
            {
                $passwordErr = "Password and Confirm Password are Different!!";
                echo $passwordErr;
            }

            if(!$strong_password_Err && !$passwordErr)
            {
                $query_get_userdata = "select * from registration where email_id = '$reset_email'";
                $results = mysqli_query($mysqli, $query_get_userdata);
                $rows = mysqli_fetch_row($results);

                if(!$strong_password_Err && !$passwordErr)
                {
                    if(mysqli_num_rows($results) > 0)
                    {    
                        $update_pwd_query = "update registration set user_password = '$new_password' where email_id = '$reset_email'";   
                        $reset_pwd = mysqli_query($mysqli, $update_pwd_query);
                        header("Location: login.php");   
                    }
                    else
                    {
                        echo '<script>alert("There is an error!!")</script>';
                    }
                }
            }
        }
        else
        {
            echo '<script>alert("You need to reset your password again!!")</script>';
        }
    }else{
        echo '<script>alert("<strong>Error: </strong> You need to reset your password again!!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>New Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>

<body>
<div class="login-form">    
        <?php
           $token1 = $_GET["token1"];
           $token2 = $_GET["token2"];  
                    ?>
                    <form action="" method="post" name="new_password_form">
                        <div class="avatar"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
                        <h4 class="modal-title">Set New Password !!</h4>
                        <input type="hidden" name="token1" value="<?php echo $token1; ?>">
                        <input type="hidden" name="token2" value="<?php echo $token2; ?>">
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password" required="required">
                            <div class="error-msg"><?php echo $strong_password_Err; ?></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_confirm_password" placeholder="Enter Confirm Password" required="required">
                            <div class="error-msg"><?php echo $passwordErr; ?></div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg" name="reset_password" value="Reset Password">
                    <?php                    
                ?></form>
</div>
</body>

</html>