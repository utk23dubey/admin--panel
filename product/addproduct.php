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
                    $sql = "SELECT id FROM category where category_name='$category_name'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                $id2=$row['id'];
                            }
                        }
                    }
$sql = "INSERT INTO product(category_id,name,price,description,user_id,createdat,status,updatedat) VALUES ('$id2','$name','$price','$description','$id','$createdat','Active','$createdat')";
	if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Added Record successfully")</script>';
    echo "<script>window.open('../product_details.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>