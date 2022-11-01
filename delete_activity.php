<?php
include_once("db-config.php");
if(isset($_GET['delete_id']))
{
    $delete_id = $_GET['delete_id'];
    $delete_images = "delete from activity_extra_images WHERE activity_id = $delete_id";
    $delete_image_result = mysqli_query($mysqli, $delete_images) or die( mysqli_error($mysqli));

    $delete_activity = "delete from activities WHERE activity_id = $delete_id";
    $delete_activity_result = mysqli_query($mysqli, $delete_activity) or die( mysqli_error($mysqli));

    echo "<script>alert('Record Deleted !!');</script>";
    echo "<script>window.location.href = 'view_activity.php'</script>"; 
}

?>
