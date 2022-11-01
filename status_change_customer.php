<?php
include_once("db-config.php");
if(isset($_GET['status_change_customer_id']))
{
    $status_change_customer_id = $_GET['status_change_customer_id'];
    $customer_data = "select status from registration where register_id = '$status_change_customer_id'";
    $customer_data_result = mysqli_query($mysqli, $customer_data) or die( mysqli_error($mysqli));
    $Row = mysqli_fetch_row($customer_data_result);
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
                    $(this).text($(this).text() == 'Block' ? 'Unblock' : 'Block');
                    <?php
                    $update_customer = "UPDATE registration SET status = 0 WHERE register_id = $status_change_customer_id";
                    $update_customer_result = mysqli_query($mysqli, $update_customer) or die( mysqli_error($mysqli));
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
                    $(this).text($(this).text() == 'Unblock' ? 'Block' : 'Unblock');
                    <?php
                    $update_customer = "UPDATE registration SET status = 1 WHERE register_id = $status_change_customer_id";
                    $update_customer_result = mysqli_query($mysqli, $update_customer) or die( mysqli_error($mysqli));
                   ?>                                                              
                });
            });
        </script>  
    <?php
    }
    echo "<script>alert('Customer Status has been Updated !!');</script>";
    echo "<script>window.location.href = 'customers.php'</script>"; 
}

?>
