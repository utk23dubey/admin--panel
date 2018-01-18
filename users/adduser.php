<?php
extract($_POST);
include('../db1.php');
$sql = "INSERT INTO myusers(name,number,email,password,category) VALUES ('$name','$number','$email','$password','$category')";
	if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Added Record successfully")</script>';
    echo "<script>window.open('../user_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>