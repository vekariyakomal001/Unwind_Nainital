<?php
include_once("db-config.php");
?>
<!doctype html>
<html>
    <head>
        <title>Add Activity</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/admin.css">
    </head>
    <?php
        include_once("db-config.php");

        $activity_name = $main_img = $extra_imgs = $activity_description = $activity_notes = $activity_price = $activity_activation = $activity_timeslots = $ride_quantity = "";

        if (isset($_POST['submit_activities'])) {
            $activity_name  =   $_POST['activity_name'];
            $activity_description =   $_POST['activity_description'];
            $activity_notes  =   $_POST['activity_notes'];
            $activity_price   =   $_POST['activity_price'];
            $activity_activation =   $_POST['activity_activation'];
            if($activity_activation == "Yes"){
                $activity_status = "1";
            }else{
                $activity_status = "0";
            }
            
            $activity_timeslots   =   $_POST['activity_timeslots'];
            $ride_quantity =   $_POST['ride_quantity'];
            
            $activity_result = mysqli_query($mysqli, "select activity_name from activities where activity_name='$activity_name'");
          
            $activity_matched = mysqli_num_rows($activity_result);
            
            /*if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid Email Format";
            }
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $strong_password_Err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }
            if(!preg_match('/^[0-9]{10}+$/', $phone)){
                $phoneErr = "Contact Number must be of 10 Digit";
            }
            if($password != $c_password)
            {
                $passwordErr = "Password and Confirm Password are Different!!";
            }
            if(!$emailErr && !$strong_password_Err && !$phoneErr && !$passwordErr)
            {*/
                if ($activity_matched > 0) 
                {
                        echo '<script>alert("Activity Already Exists !!")</script>';
                } else {
                    $result   = mysqli_query($mysqli, "INSERT INTO activities(activity_name, activity_description, notes, price, activity_activation, time_slots, ride_quantity) VALUES('$activity_name', '$activity_description', '$activity_notes', '$activity_price', '$activity_status', '$activity_timeslots', '$ride_quantity')");
                    ?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                           
                            
                            <?php
                            /*foreach($_FILES['extra_imgs']['name'] as $i => $value){
                                $image_name = $_FILES['extra_imgs']['tmp_name'][$i];
                                $folder = "images/";
                                $image_path = $folder.$_FILES['extra_imgs']['name'][$i];*/
                            ?>
                            
                               
                            
                            $("#filesToUpload").click(function(){
                                <?php
                                if(isset($_POST['extra_imgs_btn']))
                                {
                                $image_count = count($_FILES['extra_imgs']['name']);
                                
                                for($i = 0; $i < $image_count; $i++)
                                {
                                    $image_name = $_FILES['extra_imgs']['name'][$i];
                                    $image_temp_name = $_FILES['extra_imgs']['tmp_name'][$i];
                                    $folder = "images/";
                                    $image_path = $folder.$image_name;
                                    //if()
                                }
                                ?>
                                
                                $("h5.success_msg").text('Hello');
                                <?php }
                                ?>
                                /*var filename = $(this).val();
                                $("#success_msg").html($image_name);
                                $("#images_preview").html('<div class="col-lg-4"><div class="card-group"><div class="card mb-3"><img src="<?php //echo $image_path ?>" class="card-img-top" height="100"></div></div></div>');*/
                            });
                            
                           // }
                        });
                    </script>
                        <?php
                        $activity_id_query = "select activity_id from activities where activity_name='$activity_name'";
                        $activity_id_result = mysqli_query($mysqli, $activity_id_query) or die( mysqli_error($mysqli));
                        $activity_id_row = mysqli_fetch_row($activity_id_result);
                        $activity_id = $activity_id_row[0];
                        ?>
                        <script>
                            $(document).ready(function(){
                                $("#add_activities_form").submit(function(e){
                                
                                    <?php
                                        foreach($_FILES['extra_imgs']['name'] as $i => $value){
                                            $image_name = $_FILES['extra_imgs']['tmp_name'][$i];
                                            $folder = "images/";
                                            $image_path = $folder.$_FILES['extra_imgs']['name'][$i];
                                            move_uploaded_file($image_name, $image_path);

                                            $upload_image_query = mysqli_query($mysqli, "insert into activity_extra_images (image_path, activity_id) VALUES('$image_path', '$activity_id')");
                                        }
                                    ?>
                                
                                });
                            });
                        </script>
                    <?php
                    
                    //if ($result) {
                        echo '<script>alert("Activity Added Successfully.")</script>';
                        //header("location: login.php");
                    //} else {
                      //  echo '<script>alert("Something Wriong.. Please try again!!")</script>';
                    //}
                }
            //}
           
        }    
        
?>
<body>
    <div class="header_sidebar">
        <?php include 'admin_header_sidebar.php';?>
    </div>
    <div class="main_content">
        <div class="add_activity_form inner_page_title">
            <h1><b><u>Add Activity : </u><b></h1>
            <div class="col-10 grid-margin stretch-card admin_forms">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="" method="post" id="add_activities_form" name="add_activities_form"  enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="activity_name">Activity Name : </label>
                      <input type="text" class="form-control" id="activity_name" name="activity_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Activity Main Image : </label><br>
                        <div class="input-group col-xs-12 custome-file">
                            <input type="file" name="main_img" id="fileToUpload" class="file-upload-default">
                      </div>
                    </div>
                    <h5 class="text-center text-success" id="success_msg"></h5>
                    <div class="form-group">
                        <input type="submit" name="main_img_btn" class="btn btn-info btn-block" value="Upload">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 mt-4">
                            <div class="row p-2" id="image_preview"></div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Extra Images : </label><br>
                      <div class="input-group col-xs-12">
                        <input type="file" name="extra_imgs[]" id="filesToUpload" class="file-upload-default" multiple>
                      </div>
                    </div>
                    <h5 class="text-center text-success success_msg" id="success_msg"></h5>
                    <div class="form-group">
                        <input type="submit" name="extra_imgs_btn" id="extra_imgs_btn" class="btn btn-info btn-block" value="Upload">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 mt-4">
                            <div class="row p-2" id="images_preview"></div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="activity_description">Description : </label>
                      <textarea class="form-control" id="activity_description" name="activity_description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="activity_notes">Notes : </label>
                      <textarea class="form-control" id="activity_notes" name="activity_notes" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="activity_price">Price : </label>
                      <input type="text" class="form-control" id="activity_price" name="activity_price" placeholder="Rs.">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="activity_activation">Activate :</label>
                            </div>
                            <div class="col-md-1">
                                <input class="radio" type="radio" id="yes" name="activity_activation" value="Yes" checked>
                                <label class="radio" for="yes">Yes</label>
                            </div>
                            <div class="col-md-1">
                                <input class="radio" type="radio" id="no" name="activity_activation" value="No">
                                <label class="radio" for="no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="activity_timeslots">Time Slots : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" class="form-check-input" value="08:00 AM  to  10:00 AM" checked>
                                        08:00 AM  to  10:00 AM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" value="10:00 AM to 12:00 PM" class="form-check-input" checked>
                                        10:00 AM to 12:00 PM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" value="12:00 PM to 02:00 PM" class="form-check-input" checked>
                                        12:00 PM to 02:00 PM
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" value="02:00 PM to 04:00 PM" class="form-check-input" checked>
                                        02:00 PM to 04:00 PM 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" value="04:00 PM to 06:00 PM" class="form-check-input" checked>
                                        04:00 PM to 06:00 PM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots" value="06:00 PM to 08:00 PM" class="form-check-input" checked>
                                        06:00 PM to 08:00 PM 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ride_quantity">Ride Quantity</label>
                        <select class="form-control" id="ride_quantity" name="ride_quantity">
                            <?php 
                            for($i=1; $i<=20; $i++)
                            {
                                echo "<option value=".$i.">".$i."</option>";
                            }
                            ?> 
                            <option name="ride_quantity"> </option>   
                        </select>
                    </div>
                    <div class="form-group submit_cancel_btn">
                        <center>
                            <button type="submit" class="btn btn-primary me-2" name="submit_activities">Submit</button>
                            <button class="btn btn-light" name="cancel">Cancel</button>
                        </center>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>