
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Follow_Up</title>
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
 ?>
        <div id="page-wrapper" >

            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Follow Up</h1>
                             <div class="panel-body">
                            <div class="table-responsive">
                         <?php
                    // Include config file\                    
                    // Attempt select query execution
                         $i=1;
                    $sql = "SELECT * FROM followup";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>"; 
                                        echo "<th>Enquirer Name</th>";
                                        echo "<th>Client Message</th>";
                                        echo "<th>Team Message</th>";
                                        echo "<th>Handled By</th>";
                                        echo "<th>Response Given</th>";
                                        echo "<th>Date&Time</th>";
                                        echo "<th>Action</th>";  
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      echo "<td>".$i++."</td>"; 
                    $sql2= "SELECT name FROM enquiry where id=". $row['enquiry_id']. "";
                    if($result2 = mysqli_query($conn, $sql2)){
                        if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_array($result2)){
                            echo "<td>" . $row2['name'] . "</td>";
                            }
                        }
                    }

                    echo "<td>" . $row['client_message'] . "</td>";

                    echo "<td>" . $row['team_message'] . "</td>";
                                        $sql1= "SELECT name FROM myusers where id =". $row['transfer_id']."";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                            echo "<td>" . $row1['name'] . "</td>";
                            }
                        }
                    }

                                  echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['onDate'] . "</td>";

                                                                                echo "<td>";
                                            echo "<a href='followup/deletefollowup.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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