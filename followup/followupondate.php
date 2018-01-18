  <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
<?php
 
    session_start();
    $email_id=$_SESSION['email'];
                   include('../db1.php');
                   $sql = "SELECT name FROM myusers where email='$email_id'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                                $createdby=$row["name"];
                            }
                        }
                    }
                    $sql = "SELECT id FROM myusers where name='$createdby'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                                $created=$row["id"];
                            }
                        }
                    }
                    // Include config file\                    
                    // Attempt select query execution
                   date_default_timezone_set('Asia/Kolkata');  
                                $date=date("m/d/Y");
                    $i=1;            
                    $sql = "SELECT * FROM enquiry where nextfollowupdate='$date' and assigned='$created' and id NOT IN (SELECT enquiry_id FROM followup where status ='Confirm' OR status='Reject')";
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
                                        echo "<th>FollowUpDate</th>";
                                        echo "<th>Action</th>";  
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                     echo "<td>" . $i++. "</td>"; 
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
                                     echo "<td>" . $row['nextfollowupdate'] . "</td>";

                                                                                echo "<td>";
                                            echo "<a href='followup_create.php?id=". $row['id'] ."' title='Goto Record'<i class='fa fa-chevron-right' aria-hidden='true'></i></a>"; 
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No Followups For Today:).</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>

