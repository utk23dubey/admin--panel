<?php
extract($_POST);

                                include('../db1.php' );
                                $sql = "SELECT id FROM myusers where name='$createdby'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id=$row['id'];
                            }
                        }
                    }

$sql = "INSERT INTO category(category_name,user_id,createdat,status,updatedat) VALUES('$name','$id','$createdat','Active','$updatedat')";
	if ($conn->query($sql) === TRUE) {
    echo '<script>alert("New record created successfully")</script>';
    echo "<script>window.open('../category_details.php','_self')</script>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>