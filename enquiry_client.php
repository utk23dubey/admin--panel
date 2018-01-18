<!DOCTYPE html>
<?php
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enquiry</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
   <link rel="stylesheet" href="basic1.css">
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background:#E6E6FA " > 
  <?php include('include/adminheader.php'); ?>
        <!--/. NAV TOP  -->
     <?php include('include/adminleftnavigation.php'); ?>   
        <!-- /. NAV SIDE  -->
<div class='enquiry_form'>
<label style="font-size:50px"> Enquiry Form </label>
<br>
<br>  
<form action='enquiry_client/addenquiry_client.php' method="post">
<div class="form-group input-group">
<label>Enter Your Name </label>    
<input type="text" class="form-control" name="name" placeholder="Name" required>
</div>
<div class="form-group input-group">
<label>Enter Your Number </label>     
<input type="text" class="form-control" name='phone' placeholder="Number" required>
</div>
<div class="form-group input-group">
<label>Enter Your Email </label> 
<input type="text" class="form-control" name="email" placeholder="Email" required>
</div>
<div class="form-group input-group">
<label>Enter Productname </label>     
<input type="text" class="form-control"  name="productname" placeholder="Productname" required>
</div>
<div class="form-group input-group"> 
 <label>Enter Enquiry</label>   
 <br>
<textarea type="text"  name="message"class="form-control" placeholder="Message"></textarea>
</div>   
<br>
<?php if($_SESSION['msg'] == 'success'){
    echo "Data inserted successfully";
    $_SESSION['msg']='';
}
?>
<input type="submit" class="btn btn-primary" value="Submit">
</div>
</form>
</div>
</body>
</html>
