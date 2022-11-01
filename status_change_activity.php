<?php
include_once("db-config.php");
if(isset($_GET['status_change_activity_id']))
{
    $status_change_activity_id = $_GET['status_change_activity_id'];
    $activity_data = "select activity_activation from activities where activity_id = '$status_change_activity_id'";
    $activity_data_result = mysqli_query($mysqli, $activity_data) or die( mysqli_error($mysqli));
    $Row = mysqli_fetch_row($activity_data_result);
    $status = $Row[0];
    if($status == 1)
    {
        ?>
        <script>
            $(document).ready(function()
            {
                $("#activation_btn").on('click', function(e)
                {
                    $(this).toggleClass("btn btn-danger");
                    $(this).text($(this).text() == 'Deactive' ? 'Active' : 'Deactive');
                    <?php
                    $update_activity = "UPDATE activities SET activity_activation = 0 WHERE activity_id = $status_change_activity_id";
                    $update_activity_result = mysqli_query($mysqli, $update_activity) or die( mysqli_error($mysqli));
                    ?>                                                       
                });
            });
        </script>  
    <?php
    
    }
    else
    {
        ?>
        <script>
            $(document).ready(function()
            {
                $("#activation_btn").on('click', function(e)
                {
                    $(this).toggleClass("btn btn-success");
                    $(this).text($(this).text() == 'Active' ? 'Deactive' : 'Active');
                    <?php
                    $update_activity = "UPDATE activities SET activity_activation = 1 WHERE activity_id = $status_change_activity_id";
                    $update_activity_result = mysqli_query($mysqli, $update_activity) or die( mysqli_error($mysqli));
                   ?>                                                              
                });
            });
        </script>  
    <?php
    }
    echo "<script>alert('Activity Status has been Updated !!');</script>";
    echo "<script>window.location.href = 'view_activity.php'</script>"; 
}

?>
