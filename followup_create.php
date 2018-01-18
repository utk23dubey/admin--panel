
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
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
function show1()
 {
  document.getElementById('myDIV').style.display="none";
 } 
 </script> 
</head>
<body  style="overflow-x:hidden;">
    <div id="wrapper">
       <?php
$id=trim($_GET['id']);
require("db1.php");
        $sql = "SELECT * FROM enquiry where id='$id'";
        $result = $conn->query($sql) or die(mysqli_error());
        if($result){
          while($row = $result->fetch_array()){
                        $enquiry_name=$row['name'];
                        $followupdate=$row['nextfollowupdate'];
                        $id2=$row['id'];
          }

                }
include('session.php');                
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12"> 
                    <div class="panel panel-default" style="width:60%" >                                  <!-- /. NAV SIDE  -->
                      <div class='enquiry_form' style="margin-left:150px"> 
                              <!-- /. NAV SIDE  -->
                              <label style="font-size:40px">Follow Up</label>

<form action='followup/addfollowup.php?id=<?php echo $id; ?>'  method="post">
<div class="form-group input-group">
<label>Client Name </label>
<input type="text" name="enquiry_name" class="form-control" value= "<?php echo $enquiry_name; ?>" readonly>
</div>
<input type="hidden" name="abc" class="form-control" value="<?php echo $id2 ?>" readonly>
<div>
 <?php
                    // Include config file\                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM messageref where enquiry_id='$id2'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example' style='width:60%'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Client Message</th>";
                                        echo "<th>Team Message</th>";
                                        echo "<th>Handled By</th>";
                                        echo "<th>Date&Time</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                    $sql2= "SELECT name FROM enquiry where id=". $row['enquiry_id']. "";
                    if($result2 = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_array($result2)){
                            echo "<td>" . $row2['name'] . "</td>";

                            }
                        }
                    }

                    echo "<td>" . $row['client_message'] . "</td>";
                     $transfer_id=$row['transfer_id'];
                      echo $row['transfer_id'];

                    echo "<td>" . $row['team_message'] . "</td>";
                                        $sql1= "SELECT name FROM myusers where id=". $row['transfer_id']. "";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                            echo "<td>" . $row1['name'] . "</td>";
                            }
                        }
                    }
                            echo "<td>" . $row['onDate'] . "</td>";
                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No previous chats were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
  </div>
<div class="form-group input-group">
<br>    
<label>CLient Message</label>    
<br>
<textarea type="text" class="form-control" name="client_message"  placeholder="Client Message" ></textarea>
</div>
<div class="form-group input-group">
<br>    
<label>Team Message</label>
<br>    
<textarea type="text" class="form-control" name="team_message"  placeholder="Team Message"></textarea>
</div>
<div class="form-group">
<label>Status</label>
<br>
<input type="radio" name="status" onclick="show1()" value="Confirm" checked>Confirm<br>
<input type="radio" name="status" onclick="show1()" value="Reject">Reject<br>
<input type="radio" name="status" onclick="myFunction()" value="Continue">Continue<br>
</div>
<div  id="myDIV" style="display:none">
<br>    
<label>Next Follow Up Date</label>    
<br>
<div class="form-group input-group">
<input type="text" class="form-control" name="nextfollowupdate"  id="datepicker" placeholder="Next Date" />
</div>
</div>
<br>  
<input type="submit" class="btn btn-primary" value="Submit">
<input type="hidden" name="id3" value="<?php echo $id ?>">
 <?php 
date_default_timezone_set('Asia/Kolkata');  
$onDate=date("m/d/Y h:i:sa"); ?>
<input type="hidden" name="onDate" value="<?php echo $onDate ?>">

</form>
</div>
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