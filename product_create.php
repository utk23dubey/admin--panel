
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
   <link rel="stylesheet" href="basic1.css">
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
 </script> 
</head>
<body  style="overflow:hidden;" > 
<div id="wrapper">
        <?php 
include('session.php');
$email_id=$_SESSION['email'];
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">

   <div class="col-md-12" style="text-align: center"> 
                    <div class="panel panel-default" style="width:60%;text-align: center;" >                                  <!-- /. NAV SIDE  -->
                      <div class='enquiry_form' style="margin-left:200px;text-align:center;"> 
<label style="font-size:50px">Product</label>
<br>
<br>
<form action='product/addproduct.php' method="post">
<div class="form-group input-group">
<label>Category Name </label>
<select name="category_name" class="form-control">
  <?php
                                include('db1.php');
                                $sql = "SELECT category_name FROM category where status='Active'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<option value=";
                                echo $row["category_name"];
                                echo ">";
                                echo $row["category_name"];
                                echo '</option>';
                            }
                        }
                    }
                        ?>
</select>    
</div>
<div class="form-group input-group">
<label>Product Name </label>    
<input type="text" class="form-control" name="name" placeholder="Name" required>
</div>
<div class="form-group input-group">
<label>Product Price </label>    
<input type="number" class="form-control" name="price" placeholder="Price" required>
</div>
<div class="form-group input-group">
<label>Product Description </label>
<br>    
<textarea type="text" class="form-control" name="description" placeholder="Description" required></textarea>
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
<input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</html>