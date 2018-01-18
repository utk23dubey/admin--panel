
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
                        <h1 class="page-header">Categories </h1>
                             <div class="panel-body">
                            <div class="table-responsive">



                         <?php
                    // Include config file\                    
                    // Attempt select query execution
                    $i=1;     
                    $sql = "SELECT * FROM category";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>name</th>";
                                        echo "<th>CreatedBy</th>";
                                        echo "<th>CreatedAt</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>UpdatedAt</th>";
                                        echo "<th>Action</th>";  
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
               
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$i++."</td>"; 
                                    
                                    echo "<td>" . $row['category_name'] . "</td>";
                                    $sql1= "SELECT name FROM myusers where id=". $row['user_id']. "";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                            echo "<td>" . $row1['name'] . "</td>";
                            }
                        }
                    }                   

                                        echo "<td>" . $row['createdat'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['updatedat'] . "</td>";                                      
                                                                                echo "<td>";
                                            echo "<a href='category/updatecategory.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>"; 
                                            echo "<a href='category/deletecategory.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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