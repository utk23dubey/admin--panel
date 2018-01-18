<?php 
extract($_POST);
include('../db1.php');
$sql = "SELECT id FROM product where name='$product_name'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id2=$row['id'];
                            }
                        }
                    }




?>
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
                     $sql = "SELECT id FROM myusers where name='$assigned_name'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id3=$row['id'];
                            }
                        }
                    }
$sql = "INSERT INTO enquiry(name,phone,email,product_id,message,nextfollowupdate,user_id,createdat,assigned) VALUES ('$name','$phone','$email','$id2','$message','$followupdate','$id','$createdat','$id3')";
	if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Added Record successfully")</script>';
    echo "<script>window.open('../enquiry_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>