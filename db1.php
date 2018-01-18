<?php
	$conn = mysqli_connect("localhost","root","","project");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>