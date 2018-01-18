
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enquiry</title>
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

                          $sql= "SELECT name FROM myusers where email='$email_id'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                             $handle=$row['name'];
                            }
                        }
                    }
                    $sql3= "SELECT id FROM myusers where name='$handle'";
                    if($result3 = mysqli_query($conn, $sql3)){
                        if(mysqli_num_rows($result3) > 0){
                                while($row3 = mysqli_fetch_array($result3)){
                            $id=$row3['id'];
                            }
                        }

                        
                    }     
 ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Pending Enquires<strong><small>(Assigned To Me)</small></strong></h1>
                             <div class="panel-body">
                            <div class="table-responsive">
                         <?php

                          $sql1= "SELECT enquiry_id FROM followup where status ='Confirm' OR status='Reject'";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                             $already=$row1['enquiry_id'];
                            }
                        }
                    }
                    // Include config file\                    
                    // Attempt select query execution
                    $i=1;
                    $sql = "SELECT * FROM enquiry where assigned='$id' AND id NOT IN (SELECT enquiry_id FROM followup where status ='Confirm' OR status='Reject') ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Product_Name</th>";
                                        echo "<th>Message</th>";
                                        echo "<th>NextFollowUpDate</th>";
                                        echo "<th>CreatedBy</th>";
                                        echo "<th>Created At</th>";
                                        echo "<th>Action</th>";  
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                     echo "<td>".$i++."</td>"; 
                                     echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                    $sql2= "SELECT name FROM product where id=". $row['product_id']. "";
                    if($result2 = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_array($result2)){
                            echo "<td>" . $row2['name'] . "</td>";
                            }
                        }
                    } 
                                        echo "<td>" . $row['message'] . "</td>";
                                         echo "<td>" . $row['nextfollowupdate'] . "</td>";
                                        $sql1= "SELECT name FROM myusers where id=". $row['user_id']. "";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                            echo "<td>" . $row1['name'] . "</td>";
                            }
                        }
                    }
                                  echo "<td>" . $row['createdat'] . "</td>";       
                       

                                                                                echo "<td>";
                                            echo "<a href='enquiry/update_enquiry.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span>
                                            </a>";
                                            echo '&nbsp&nbsp';
                                            echo "<a href='followup_create.php?id=". $row['id'] ."' title='Go to FollowUp'<i class='fa fa-chevron-right' aria-hidden='true'></i></a>"; 
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
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
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>