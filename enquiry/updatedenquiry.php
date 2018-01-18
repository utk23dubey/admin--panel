<?php
// Include config file
require('../db1.php');
extract($_POST);
 $sql = "SELECT id FROM product where name='$product_name'";
                $result = $conn->query($sql) or die(mysqli_error());
                if($result){
                    while($row = $result->fetch_array()){
                        $id1=$row['id'];
                    }
                }
 $sql1 = "SELECT id FROM myusers where name='$transfer_name'";
                $result1 = $conn->query($sql1) or die(mysqli_error());
                if($result1){
                    while($row1 = $result1->fetch_array()){
                        $id2=$row1['id'];
                    }
                }
$sql2 = "SELECT id FROM enquiry where name='$name'";
                $result2 = $conn->query($sql2) or die(mysqli_error());
                if($result2){
                    while($row2 = $result2->fetch_array()){
                        $id3=$row2['id'];
                    }
                }                 
date_default_timezone_set('Asia/Kolkata');  
$time=date("d/m/Y h:i:sa");
if($transfer==$transfer_name){
 $sql = "UPDATE enquiry SET name='$name', phone='$phone',email='$email',product_id='$id1',message='$message',nextfollowupdate='$nextfollowupdate',assigned='$id2' where id='$id'";
    if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Updated Record successfully")</script>';
    echo "<script>window.open('../enquiry_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else{
    $sql = "UPDATE enquiry SET name='$name', phone='$phone',email='$email',product_id='$id1',message='$message',nextfollowupdate='$nextfollowupdate',assigned='$id2' where id='$id'";
    if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Updated Record successfully")</script>';
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT into  refrence(enquiry_id,transfer_id,onDate) VALUES('$id3','$id2','$time')";
    if ($conn->query($sql) === TRUE) {
    echo "<script>window.open('../enquiry_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>