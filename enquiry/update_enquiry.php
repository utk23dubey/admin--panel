<?php
$id=trim($_GET['id']);
echo $id;
$id2=trim($_GET['id']);
require("../db1.php");
                $sql = "SELECT * FROM enquiry where id='$id'";
                $result = $conn->query($sql) or die(mysqli_error());
                if($result){
                    while($row = $result->fetch_array()){
                        $name=$row['name'];
                        $phone=$row['phone'];
                        $email=$row['email'];
                        $product_id=$row['product_id'];
                        $message=$row['message'];
                        $nextfollowupdate=$row['nextfollowupdate'];
                        $user_id=$row['user_id'];
                        $createdat=$row['createdat'];
                        $assigned=$row['assigned'];
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
                $sql1 = "SELECT name FROM product where id='$product_id'";
                $result2 = $conn->query($sql1) or die(mysqli_error());
                if($result2){
                    while($row2 = $result2->fetch_array()){
                        $name2=$row2['name'];
                    }
                }
                    
                ?>
                <?php
                $sql4 = "SELECT name FROM myusers where id='$assigned'";
                $result4 = $conn->query($sql4) or die(mysqli_error());
                if($result4){
                    while($row4 = $result4->fetch_array()){
                        $name4=$row4['name'];
                    }
                }
              
               $sql3= "SELECT transfer_id FROM refrence where enquiry_id='$id' ORDER BY onDate Desc LIMIT 1";
                    if($result3 = mysqli_query($conn, $sql3)){
                        if(mysqli_num_rows($result3) > 0){
                                while($row3 = mysqli_fetch_array($result3)){
                            $transfer_id= $row3['transfer_id'];

                            
                            }

                        }
                    }
                    else{
                      echo "no transfer_id";
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
                      <div class='enquiry_form' style="margin-left:100px"> 
                        <h2>Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                       <form action="updatedenquiry.php" method="post" enctype="multipart/form-data">   
                         <div class="form-group input-group">
                           <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                        </div>
                         <div class="form-group input-group">
                           <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
                        </div>
                         <div class="form-group input-group">
                           <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                        </div>
                                                <div class="form-group input-group">
                           <label>Products</label>
                           <select name="product_name" class="form-control">
                            <?php echo "<option value='$name2' selected>$name2</option>"; ?>
  <?php
                                include('db1.php');
                                $sql = "SELECT name FROM product where status='Active' AND name != '$name2' ";
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
                           <div class="form-group input-group">
                           <label>Message</label>
                            <input type="text" name="message" class="form-control" value="<?php echo $message; ?>" required>
                        </div>   
                         <div class="form-group input-group">
                           <label>FollowUpdate</label>
                            <input type="text" name="nextfollowupdate" id="datepicker2" class="form-control" " value="<?php echo $nextfollowupdate; ?>" required>
                        </div>
                            <input type="hidden" name="createdby"  class="form-control" value="<?php echo $name1; ?>" readonly>
                            <input type="hidden" name="createdat" id="datepicker" class="form-control" value="<?php echo $createdat; ?>" readonly >
                         <div class="form-group input-group">
                           <label>Transfer To</label>
                           <select name="transfer_name" class="form-control">
                            <?php echo "<option value='$name4' selected>$name4</option>"; ?>
  <?php
                                include('db1.php');
                                $sql = "SELECT name FROM myusers where name != '$name4' ";
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
                       <input type="hidden" name="id"  value="<?php echo $id2; ?>" > 
                       <input type="hidden" name="transfer"  value="<?php echo $name4; ?>" > 
                         <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../enquiry_details.php" class="btn btn-default">Cancel</a>
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