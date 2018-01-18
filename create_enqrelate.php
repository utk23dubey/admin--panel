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
<body>
    <div id="wrapper">
        <?php include('include/adminheader.php'); ?>

        <!--/. NAV TOP  -->
       <?php include('include/adminleftnavigation.php'); ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
 <div class="col-md-12" style="margin-left:200px"> 
                    <div class="panel panel-default" style="width:60%" >                                  <!-- /. NAV SIDE  -->
                      <div class='enquiry_form' style="margin-left:200px"> 
<label style="font-size:50px"> Enquiry Form </label>
<br>
<br>  
<form action='enquiry/addenqrelate.php' method="post">
<label>Client Name </label>
<select name="enquiry_name">
  <?php
                                include('db1.php');
                                $sql = "SELECT name FROM enquiry";
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
<br>
<label>Handled By </label>
<select name="createdby">
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
<br>    
<div class="form-group input-group">
<br>    
<label>Created At</label>    
<input type="text" class="form-control" name="createdat"  placeholder="Created At" value="<?php echo date('d/m/Y'); ?>"  readonly>
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
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
          <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>