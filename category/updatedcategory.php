<?php
// Include config file
require('../db1.php');
extract($_POST);
 $sql = "UPDATE category SET category_name='$category_name',status='$status',updatedat='$updatedat' where id='$id'";
	if ($conn->query($sql) === TRUE) {
   echo '<script>alert("Updated Record successfully")</script>';
    echo "<script>window.open('../category_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>