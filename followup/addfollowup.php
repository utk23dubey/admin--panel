<?php
extract($_POST);


                                include('../db1.php' );
                                    $sql = "SELECT id FROM enquiry where name='$enquiry_name'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id2=$row['id'];
                            }
                        }
                    }
                                $sql1 = "SELECT assigned FROM enquiry where id = '$abc'";
                    if($result1 = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result1) > 0){
                                while($row1 = mysqli_fetch_array($result1)){
                                $id=$row1['assigned'];
                            }
                        }
                    }
$sql = "INSERT INTO followup(enquiry_id,client_message,team_message,transfer_id,status,onDate) VALUES ('$id2','$client_message','$team_message','$id','$status','$onDate')";
    if ($conn->query($sql) === TRUE) {
   echo '<script>alert("Added Record successfully")</script>';
    echo "<script>window.open('../followup_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if($status==='Continue')
{
    $sql = "INSERT INTO messageref(enquiry_id,client_message,team_message,transfer_id,onDate) VALUES ('$id2','$client_message','$team_message','$id','$onDate')";
    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    $sql = "UPDATE enquiry SET nextfollowupdate='$nextfollowupdate' where id='$id4'";
    if ($conn->query($sql) === TRUE) {
    echo "<script>window.open('../followup_details.php','_self')</script>";
}
else{
    echo "<script>window.open('../followup_details.php','_self')</script>";
}
}
$conn->close();
?>