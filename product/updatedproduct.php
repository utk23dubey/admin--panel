<?php
// Include config file
require('../db1.php');
extract($_POST);
$id=trim($_GET["id"]);
 $sql = "SELECT id FROM category where category_name='$category_name'";
                $result = $conn->query($sql) or die(mysqli_error());
                if($result){
                    while($row = $result->fetch_array()){
                        $id1=$row['id'];
                    }
                }

 $sql = "UPDATE product SET category_id='$id1',name='$name', price='$price',description='$description',status='$status',updatedat='$updatedat' where id='$id'";
	if ($conn->query($sql) === TRUE) {
   echo '<script>alert("Updated Record successfully")</script>';
    echo "<script>window.open('../product_details.php','_self')</script>";
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>