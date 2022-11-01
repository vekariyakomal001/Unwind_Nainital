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
            <h1><b><u>View All Customers : </u><b></h1>
            <div class="view_table">
                <div class="card-body admin_forms">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $customer_data = "select * from registration WHERE user_role_id = 2";
                                    $customer_data_result = mysqli_query($mysqli, $customer_data) or die( mysqli_error($mysqli));
                                    $customer_matched = mysqli_num_rows($customer_data_result);
                                    
                                    $sr_no = 1;
                                    if ($customer_matched > 0)
                                    { 
                                        while($all_customer = mysqli_fetch_array($customer_data_result))
                                        {
                                            $customer_fname = $all_customer['fname'];
                                            $customer_lname = $all_customer['lname'];
                                            $customer_name = $customer_fname. " " .$customer_lname;
                                            ?>
                                                <tr>
                                                    <td><?php echo $sr_no;?></td>
                                                    <td><?php echo $customer_name;?></td>
                                                    <td><?php echo $all_customer['email_id'];?></td>
                                                    <td><?php echo $all_customer['phone'];?></td>
                                                    <td><?php echo $all_customer['gender']; ?></td>
                                                    <td>
                                                    <a href="status_change_customer.php?status_change_customer_id=<?php echo $all_customer['register_id'];?>"><button type="button" class="btn <?php echo $all_customer['status'] == '1' ? 'btn-success':'btn-danger' ;?>" id="activation_btn" onclick="return confirm('Do you really want to <?php echo $all_customer['status'] == '1' ? 'Block':'Unblock';?> <?php echo $customer_name; ?>?');"><?php echo $all_customer['status'] == '1' ? 'Unblock':'Block';?></button></a>
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