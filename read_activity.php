<?php
include_once("db-config.php");
$read_id = $_GET['read_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Activity</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/admin.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <?php
            
        $activity_result = mysqli_query($mysqli, "select * from activities where activity_id='$read_id'");
          
        $activity_matched = mysqli_num_rows($activity_result);

        if ($activity_matched > 0) 
        {
            ?>
            <?php
            
        }else{
            echo "Record Not Found";
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
                      <input type="text" class="form-control" id="activity_name" name="activity_name" placeholder="Name" required="required">
                    </div>
                    <div class="form-group">
                        <label>Activity Main Image : </label><br>
                        <div class="input-group col-xs-12 custome-file">
                            <input type="file" name="main_img" id="fileToUpload" class="file-upload-default" required="required">
                        </div>
                        
                    </div>
                    <h5 class="text-center text-success" id="success_msg"></h5>
                    <div class="row p-2" id="image_preview"></div>
                    <div class="error-msg" id="image_error_msg"></div>
                    <div class="form-group">
                      <label>Extra Images : </label><br>
                      <div class="input-group col-xs-12">
                        <input type="file" name="extra_imgs[]" id="filesToUpload" class="file-upload-default" multiple="multiple" required="required">
                      </div>
                    </div>
                    <h5 class="text-center text-success success_msg" id="success_msg"></h5>
                    <div class="row p-2" id="images_preview"></div>
                    <div class="error-msg" id="images_error_msg"></div>
                    <div class="form-group">
                      <label for="activity_description">Description : </label>
                      <textarea class="form-control" id="activity_description" name="activity_description" rows="4" required="required"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="activity_notes">Notes : </label>
                      <textarea class="form-control" id="activity_notes" name="activity_notes" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="activity_price">Price : </label>
                      <input type="text" class="form-control" id="activity_price" name="activity_price" placeholder="Rs." required="required">
                      <div class="error-msg"><?php echo $activityPriceErr; ?></div>
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
                                        <input type="checkbox" name="activity_timeslots[]" class="form-check-input" value="08:00 AM  to  10:00 AM">
                                        08:00 AM  to  10:00 AM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots[]" value="10:00 AM to 12:00 PM" class="form-check-input">
                                        10:00 AM to 12:00 PM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots[]" value="12:00 PM to 02:00 PM" class="form-check-input">
                                        12:00 PM to 02:00 PM
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots[]" value="02:00 PM to 04:00 PM" class="form-check-input">
                                        02:00 PM to 04:00 PM 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots[]" value="04:00 PM to 06:00 PM" class="form-check-input">
                                        04:00 PM to 06:00 PM
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label checkbox">
                                        <input type="checkbox" name="activity_timeslots[]" value="06:00 PM to 08:00 PM" class="form-check-input" >
                                        06:00 PM to 08:00 PM 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="error-msg"><?php echo $activityTimeslot; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="ride_quantity">Ride Quantity</label>
                        <select class="form-control" id="ride_quantity" name="ride_quantity">
                            <option value="0">-- Select Ride Quantity --</option>
                            <?php 
                            for($i=1; $i<=20; $i++)
                            {
                                echo "<option value=".$i.">".$i."</option>";
                            }
                            ?> 
                            <option name="ride_quantity"> </option>   
                        </select>
                        <div class="error-msg"><?php echo $rideQtyErr; ?></div>
                        
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
    
    <script>

        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png)$/;
            
            $("#fileToUpload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var single_image_Preview = $("#image_preview");
                    single_image_Preview.html("");
                
                    var file1 = this.files[0];;
                    if (regex.test(file1.name.toLowerCase())) {
                        $("#image_error_msg").html("");
                         // it provides methods to read files
                        var reader = new FileReader();
                        reader.onload = function (event) 
                        {
                            var imgs = $("<img />");
                            imgs.attr("style", "height:100px;width: 100px; border-style: solid; padding: 0.2rem;margin-right:1rem;");
                            imgs.attr("src", event.target.result); // result give file content
                            single_image_Preview.append(imgs);
                        }
                        reader.readAsDataURL(file1);
                    }
                    else{
                        //alert(file1.name + " is not a valid image file.");
                        $("#image_error_msg").html(file1.name + " is not a valid image file.");
                        //$imageErr = file1.name + " is not a valid image file.";
                        single_image_Preview.html("");
                        return false;
                    }
                }
                else 
                {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
            
            $("#filesToUpload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var image_Preview = $("#images_preview");
                    image_Preview.html("");
                   
                    $($(this)[0].files).each(function () 
                    {
                        var file = $(this);
                        
                        if (regex.test(file[0].name.toLowerCase())) {
                            $("#images_error_msg").html("");
                                // it provides methods to read files
                                var readers = new FileReader();
                                readers.onload = function (e) {
                                    var img = $("<img />");
                                    img.attr("style", "height:100px;width: 100px; border-style: solid; padding: 0.2rem;margin-right:1rem;");
                                    img.attr("src", e.target.result); // result give file content
                                    image_Preview.append(img);
                                }
                                readers.readAsDataURL(file[0]);
                        }
                        else{
                            $("#images_error_msg").html("You can upload jpg, jpeg, gif, png files only..");
                            //alert(file[0].name + " is not a valid image file.");
                            image_Preview.html("");
                            return false;
                        }
                    });
                }
                else 
                {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
     

    </script>
   <script src="./assets/js/main.js"></script>

</body>

</html>