<?php 
include('session.php');
$email_id=$_SESSION['email'];

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
      <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
 </script> 
</head>
<body  style="overflow-x:hidden;">
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12"> 
                    <div class="panel panel-default" style="width:60%;" >                                  <!-- /. NAV SIDE  -->
<div class='enquiry_form' style="margin-left:100px">
<label style="font-size:50px"
> Enquiry Form </label>
<br>
<br>  
<form action='enquiry/addenquiry_client.php' method="post">
<?php 
date_default_timezone_set('Asia/Kolkata');  
echo "The time is " . date("d/m/Y h:i:sa"); ?>
<div class="form-group input-group">
<label>Name </label>    
<input type="text" class="form-control" name="name" placeholder="Name" required>
</div>
<div class="form-group input-group">
<label>Number </label>     
<input type="number" class="form-control" name='phone' placeholder="Number" required>
</div>
<div class="form-group input-group">
<label>Email </label> 
<input type="email" class="form-control" name="email" placeholder="Email" required>
</div>
<div class="form-group input-group">
<label>Product Name </label>
<select name="product_name" class="form-control">
  <?php
                                include('db1.php');
                                $sql = "SELECT name FROM product where status='Active'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<option value=";
                                echo $row["name"];
                                echo ">";
                                echo $row["name"];
                                echo '</option>';
                            }
                        }
                    }
                        ?>
</select>
<br>
<div class="form-group input-group">
<br>    
<label>Enter Your Message </label> 
<textarea type="text" class="form-control" name="message" placeholder="Message" required></textarea>
</div>
<div class="form-group input-group">
<label>FollowUpdate</label>    
<input type="text" class="form-control" name="followupdate"  id ="datepicker2" placeholder="Next FollowUp  Update" required>
</div>
                                <?php
                                include('db1.php');
                                $sql = "SELECT name FROM myusers where email='$email_id'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                                $createdby=$row["name"];
                            }
                        }
                    }
                        ?>
<input type="hidden" class="form-control" name="createdby" placeholder="Createdby" value="<?php echo $createdby; ?>" readonly>
<input type="hidden" class="form-control" name="createdat"  placeholder="Created At" value="<?php echo date('d/m/Y'); ?>"  readonly>
<div class="form-group input-group">
<label>Assigned To</label>
<select name="assigned_name" class="form-control">
  <?php
  include('db1.php');
                                $sql = "SELECT name FROM myusers";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                               echo "<option value=";
                                echo $row["name"];
                                echo ">";
                                echo $row["name"];
                                echo '</option>';
                            }
                        }
                    }
                               
                        ?>
</select>    
</div>
<input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
</div>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>