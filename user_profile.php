
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
</head>
<body  style="overflow-x:hidden;">
    <div id="wrapper">
      <?php include('db1.php');
include('session.php');
$email_id=$_SESSION['email'];
 ?>
   
        <div id="page-wrapper"  >
            <div id="page-inner">
			 <div class="row">
                         <div class="col-md-12">    
                         <div class="panel panel-default" style="width:100%;" >                               <!-- /. NAV SIDE  -->
                      <div class='enquiry_form'> 
                    <?php
                                include('db1.php');
                                $sql = "SELECT * FROM myusers where email='$email_id'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id=$row["id"];
                                $name=$row["name"];
                                $email=$row["email"];
                                $number=$row['number'];
                                $category=$row['category'];

                            }
                        }
                    }
                        ?>
            <div   class="table-responsive">
            <div style="text-align:center">   
            <label style="font-size:40px">User Details </label>
            </div>          
            <table class="table table-striped table-bordered table-hover">
            <tr class="info">
            <td>            
            <label style="font-size:20px">Name</label></td>   
            <td><label style="font-size:20px"><?php echo $name ?></label></td>
          </tr>
            <br>
              <tr>
            <td>            
            <label style="font-size:20px">Email</label></td>   
            <td><label style="font-size:20px"><?php echo $email ?></label></td>
          </tr>  <tr>
            <td>            
            <label style="font-size:20px">Number</label></td>   
            <td><label style="font-size:20px"><?php echo $number ?></label></td>
          </tr>  <tr>
            <td>            
            <label style="font-size:20px">Category</label></td>   
            <td><label style="font-size:20px"><?php echo $category ?></label></td>
          </tr>

            <?php
            include('db1.php');
            $sql1 = "SELECT COUNT(name) AS name  FROM product where user_id='$id'";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
                                     $count_products=$row1['name'];
                                                 
              }
            }
          }
              ?>  
              <?php
            include('db1.php');
            $sql1 = "SELECT COUNT(name) AS name  FROM enquiry where user_id='$id' AND id NOT IN(SELECT enquiry_id from followup where status='Confirm' OR status ='Reject' )";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
                                     $count_enquiry=$row1['name'];
                                                 
              }
            }
          }
              ?>  
              <?php
            include('db1.php');
            $sql1 = "SELECT COUNT(name) AS name  FROM enquiry where assigned='$id'";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
                                     $count_assigned=$row1['name'];
                                                 
              }
            }
          }
              ?>  
              <?php
            include('db1.php');
            $sql1 = "SELECT COUNT(enquiry_id) AS enquiry_id  FROM followup where transfer_id='$id' and status='Confirm'";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
            $count_completed=$row1['enquiry_id'];                                   
              }
            }
          }
              ?>
              <?php
            include('db1.php');
            $sql1 = "SELECT COUNT(enquiry_id) AS enquiry  FROM followup where transfer_id='$id' and status='Reject'";
            if($result1 = mysqli_query($conn, $sql1)){
            if(mysqli_num_rows($result1) > 0){
            while($row1 = mysqli_fetch_array($result1)){
            $count_reject=$row1['enquiry'];                                   
              }
            }
          }
              ?>    
                <tr>
            <td>            
            <label style="font-size:20px">Products Created</label></td>   
            <td><label style="font-size:20px"><?php echo $count_products; ?></label></td>
          </tr>
            <tr>
            <td>            
            <label style="font-size:20px">Enquiry Created</label></td>   
            <td><label style="font-size:20px"><?php echo $count_enquiry; ?></label></td>
          </tr>
            <tr>
            <td>            
            <label style="font-size:20px">Enquiry Assigned</label></td>   
            <td><label style="font-size:20px">
              <?php
              if($count_completed==0)
               {
                echo $count_assigned;
               }
               else{
               echo $count_assigned-$count_completed;
                }
                ?>
            </label></td>
          </tr> 
          <tr>
            <td>            
            <label style="font-size:20px">Enquiries Completed</label></td>   
            <td><label style="font-size:20px"><?php echo $count_completed; ?>
              </label></td>
          </tr>
          <tr>
            <td>            
            <label style="font-size:20px">Enquiry Rejected</label></td>   
            <td><label style="font-size:20px"><?php echo $count_reject; ?></label></td>
          </tr>     
        </table>
      </div>
              
                   </div>
               </div>
           </div>

                    </div>
                </div> 
              </div>
                 <!-- /. ROW  -->
				</div>
             <!-- /. PAGE INNER  -->
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>