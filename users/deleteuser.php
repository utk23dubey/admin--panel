<?php
require('../db1.php');
$id=trim($_GET["id"]);
// Process delete operation after confirmation
$sql = "DELETE from myusers where id='".$id."'";
    if ($conn->query($sql) === TRUE) {
    header("Location:../user_details.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>