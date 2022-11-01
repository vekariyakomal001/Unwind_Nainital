<?php
include_once("db-config.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Activity</title>
        <meta charset="utf-8">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/admin.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    
<body>
    
    <div class="header_sidebar">
        <?php include 'admin_header_sidebar.php';?>
    </div>
    <div class="main_content">
        <div class="add_activity_form inner_page_title">
            <h1><b><u>View All Activity : </u><b></h1>
            <div class="view_table">
                <div class="card-body admin_forms">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $activity_data = "select activity_id, activity_name, main_image, price, activity_activation from activities";
                                    $activity_data_result = mysqli_query($mysqli, $activity_data) or die( mysqli_error($mysqli));
                                    $activity_matched = mysqli_num_rows($activity_data_result);
                                    
                                    $sr_no = 1;
                                    if ($activity_matched > 0)
                                    { 
                                        while($all_activity = mysqli_fetch_array($activity_data_result))
                                        {
                                            $activity_name = $all_activity['activity_name'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $sr_no;?></td>
                                                    <td><?php echo $all_activity['activity_name'];?></td>
                                                    <td><?php echo "<img style='height:100px; width: 100px;' src=".$all_activity['main_image'].'>'?></td>
                                                    <td><?php echo "$ ".$all_activity['price'];?></td>
                                                    <td>
                                                    <a href="status_change_activity.php?status_change_activity_id=<?php echo $all_activity['activity_id'];?>"><button type="button" class="btn <?php echo $all_activity['activity_activation'] == '1' ? 'btn-success':'btn-danger' ;?>" id="activation_btn" onclick="return confirm('Do you really want to <?php echo $all_activity['activity_activation'] == '1' ? 'Deactivate':'Activate';?> <?php echo $activity_name; ?>?');"><?php echo $all_activity['activity_activation'] == '1' ? 'Active':'Deactive';?></button></a>
                                                    </td>
                                                    <td>
                                                        
                                                        <a href="edit_activity.php?edit_id=<?php echo $all_activity['activity_id'];?>"><i class='fas fa-edit' style='font-size:24px;color: green;'></i></a>&nbsp;&nbsp;&nbsp;
                                                        <a href="delete_activity.php?delete_id=<?php echo $all_activity['activity_id'];?>"  onclick="return confirm('Do you really want to Delete <?php echo $activity_name; ?>?');"><i class='fas fa-trash' style='font-size:24px;color: red;'></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            $sr_no++;
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                        </tr>
                                        <?php
                                    }       
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
   <script src="./assets/js/main.js"></script>

</body>

</html>