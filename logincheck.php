<?php
	require_once("db.php");
   extract($_POST);
   echo $email;
   echo $password;
session_start();
if(isset($_POST))  
{  
  
    $check_user="select * from MyUsers WHERE email='$email'AND password='$password'";  
  
    $run=mysqli_query($conn,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
      $_SESSION['email']=$email;
        echo "<script>window.open('index.php','_self')</script>";  
         

        //here session is used and value of $user_email store in $_SESSION.  
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";
      echo "<script>window.open('login.php','_self')</script>";
    }  
} 
// if($_SERVER["REQUEST_METHOD"] == "POST")
// {
// // username and password sent from Form
 
// $sql="SELECT id FROM MyUsers WHERE email='$email' and password='$password';";
// $result=mysql_query($conn,$sql);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// $active=$row['active'];
// $count=mysql_num_rows($result);
// // If result matched $myusername and $mypassword, table row must be 1 row
// if($count==1)
// {
// session_register("$name");
// $_SESSION['login_user']=$name;
// echo "Login SuccessFul"; 
// }
// else
// {
// $error="Your Login Name or Password is invalid";
// }
// }
 ?>