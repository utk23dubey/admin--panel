<?php
$id=trim($_GET['id']);
require("../db1.php");
        $sql = "SELECT * FROM product where id='$id'";
        $result = $conn->query($sql) or die(mysqli_error());
        if($result){
          while($row = $result->fetch_array()){
            $category_id=$row['category_id'];
                        $name=$row['name'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $user_id=$row['user_id'];
                        $createdat=$row['createdat'];
                        $status=$row['status'];
                        $updatedat=$row['updatedat'];
          }
                }

                $sql = "SELECT name FROM myusers where id='$user_id'";
                $result = $conn->query($sql) or die(mysqli_error());
                if($result){
                    while($row = $result->fetch_array()){
                        $name1=$row['name'];
                    }
                }
                ?>
                <?php
                $sql1 = "SELECT category_name FROM category where id='$category_id'";
                $result2 = $conn->query($sql1) or die(mysqli_error());
                if($result2){
                    while($row2 = $result2->fetch_array()){
                        $name2=$row2['category_name'];
                    }
                }
                    
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
      <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
<body >
    <div id="wrapper">
        <?php include('../session.php'); ?>

        <!--/. NAV TOP  -->
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">

   <div class="col-md-12"> 
                    <div class="panel panel-default" style="width:60%" >                                  <!-- /. NAV SIDE  -->
                      <div class='enquiry_form' style="margin-left:200px"> 
                        <h2>Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                              <form action="updatedproduct.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           <label>Category</label>
                           <input type="text" name="category_name" value="<?php echo $name2; ?>" class="form-control" readonly>
                         <div class="form-group input-group">
                           <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>
                         <div class="form-group input-group">
                           <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                        </div>
                         <div class="form-group input-group">
                           <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                        </div>
                            <input type="hidden" name="createdby"  class="form-control" value="<?php echo $name1; ?>" readonly>
                
                     
                        
                            <input type="hidden" name="createdat" id="datepicker" class="form-control" value="<?php echo $createdat; ?>" readonly >
                      
                        <div class="form-group input-group">
                           <label>Status</label>
                           <br>
                           <input type="radio" name="status" class="form-group" value="Active" checked>Active<br>
                            <input type="radio" name="status" class="form-group" value="InActive">InActive<br>
                        </div>
                        <div class="form-group input-group">
                           <label>Updatedat</label>
                            <input type="text" name="updatedat" id="datepicker2" class="form-control"  value="<?php echo $updatedat; ?>" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../product_details.php" class="btn btn-default">Cancel</a>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
</body>
</html>