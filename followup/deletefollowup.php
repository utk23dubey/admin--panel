<?php
require('../db1.php');
$id=trim($_GET["id"]);
// Process delete operation after confirmation
$sql = "DELETE from followup where id='".$id."'";
    if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Delete Record successfully")</script>';
    echo "<script>window.open('../followup_details.php','_self')</script>";
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>