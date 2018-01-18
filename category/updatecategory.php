<?php
$id=trim($_GET['id']);
require("../db1.php");
				$sql = "SELECT * FROM category where id='$id'";
				$result = $conn->query($sql) or die(mysqli_error());
				if($result){
					while($row = $result->fetch_array()){
						$category_name=$row['category_name'];
                        $user_id=$row['user_id'];
                        $createdat=$row['createdat'];
                        $status=$row['status'];
                        $id2=$row['id'];
					}
                }
                $sql = "SELECT name FROM myusers where id='$user_id'";
                $result = $conn->query($sql) or die(mysqli_error());
                if($result){
                    while($row = $result->fetch_array()){
                        $name=$row['name'];
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
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">

   <div class="col-md-12" style="margin-left:200px"> 
                    <div class="panel panel-default" style="width:60%" >                                  <!-- /. NAV SIDE  -->
                      <div class='enquiry_form' style="width: 50%;margin-left:200px"> 
                        <h2>Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="updatedcategory.php" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           <label>Category</label>
                           <input type="text" name="category_name" value="<?php echo $category_name; ?>" class="form-control" readonly>
                         </div>
                            <input type="hidden" name="createdby"  class="form-control" value="<?php echo $name; ?>" readonly>
                        
                            <input type="hidden" name="createdat" id="datepicker" class="form-control" value="<?php echo $createdat; ?>" readonly>
                            <input type="hidden" name="id" id="datepicker" class="form-control" value="<?php echo $id2; ?>" readonly>
      
                         <div class="form-group input-group">
                           <label>Status</label>
                           <br>
                           <?php
                           if($status=='Active'){
                            echo '<input type="radio" name="status" value="Active" checked >Active<br>';
                            echo '<br>';
                             echo '<input type="radio" name="status" id="watch-me" value="InActive">InActive<br>';
                           }
                           else
                           {
                            echo '<input type="radio" name="status" value="Active"  >Active<br>';
                            echo '<br>';
                             echo '<input type="radio" name="status" id="watch-me"  value="InActive" checked>InActive<br>';

                           }

                              ?>                       
                        </div>
                        <div class="form-group form-group input-group">
                           <label>Updatedat</label>
                          <input type="text" class="form-control" name="updatedat" value="<?php echo date('d/m/Y'); ?>"   readonly>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../category_details.php" class="btn btn-default">Cancel</a>
                    </form>
                  </div>
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