<?php
session_start();

// Create database connection using config file
include_once("db-config.php");

// This page can be accessed only after login
// Redirect user to login page, if user email is not available in session
if ($_SESSION["email"] == true){
    $email_id = $_SESSION['email'];
    echo "Welcome ".$email_id;
}
else{
    header("location: login.php");
}

$query = "Select * From registration where email_id = '$email_id'";
$result = mysqli_query($mysqli, $query) or die( mysqli_error($mysqli));
$Row = mysqli_fetch_row($result);
$fname = $Row[1];
$lname = $Row[2];
$full_name = $fname. " " .$lname;
echo $full_name;
?>

<html>

<body>
    <div style="text-align:right">
        <a href="logout.php">Logout</a>
    </div>

    This is a sample content on page-1. This page content is only available for login users.
    <br>
    <a href="page-2.php">Go to page-2</a>

</body>

</html>