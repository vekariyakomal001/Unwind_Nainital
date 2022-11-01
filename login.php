    <?php
session_start();

include_once("db-config.php");
$sql = "SELECT * FROM user_role";
$all_user_role = mysqli_query($mysqli,$sql);
?>

<!DOCTYPE html>
<html>

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
    <form action="login.php" method="post" name="login_form" autocomplete="off">
		<div class="avatar"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title">Login to Your Account</h4>
        <div class="form-group">
            <select id="user_role_name" name="user_role_name" class="user_role_name form-control browser-default custom-select">
                <option value="0">-- Select User Role --</option>
                <?php
                    while ($user_role = mysqli_fetch_array(
                            $all_user_role,MYSQLI_ASSOC)):;
                ?>
                    <option value="<?php echo $user_role["user_role_id"];
                    ?>">
                        <?php echo $user_role["user_role"];
                        ?>
                    </option>
                <?php
                    endwhile;
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group clearfix">
            <a href="forgot_password.php" class="forgot-link"><u>Forgot Password?</u></a>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="login" value="Login">
        
        <?php

if (isset($_POST['login'])) {
    
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $user_role_id   =   $_POST['user_role_name'];
    
    $result = "select email_id, user_password, user_role_id, status from registration
        where user_role_id = '$user_role_id' AND (email_id='$email' and user_password='$password') ";          
    $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
    $user_matched = mysqli_num_rows($query_result);
    $Row = mysqli_fetch_row($query_result);
    $status = $Row[3];

    $compare_email = mysqli_query($mysqli, "select email_id from registration where email_id = '$email'");
    $email_record = mysqli_num_rows($compare_email);

    if(isset($_REQUEST['user_role_name']) && $_REQUEST['user_role_name'] == '0') 
    { 
        echo '<script>alert("Please Select User Role")</script>';
    }
    else if($email_record <= 0)
    {
        echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
    }
    else if ($user_matched > 0) {
        if($status == 1)
        {
            $_SESSION["email"] = $email;
            if($user_role_id == "1"){
                header("location: admin_dashboard.php");
            }if($user_role_id == "2"){
                header("location: ./front_end/Home.html");
            }
        }else{
            echo '<script>alert("You cannot login !! Please Contact to the Administrative Department...")</script>';
        }   
    } else {
        echo '<script>alert("User email, password or user role is not matched..")</script>';
    }
}

?>
    </form>			
    <div class="text-center small create_account">Don't have an account? <a href="register.php"><b><u>Sign up</u></b></a></div>
</div>
    <script src="./assets/js/main.js"></script>
</body>

</html>