<?php
   include('db.php');
   session_start();
   $user_check=$_SESSION['email'];
                    
                    include('include/adminheader.php');
                    
                             $sql= "SELECT * FROM myusers where email='$user_check'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                             $handle=$row['name'];
                             $category=$row['category'];
                             $id=$row['id'];
                            }
                        }
                    }
                    $sql3= "SELECT * FROM myusers where id='$id'";
                    if($result3 = mysqli_query($conn, $sql3)){
                        if(mysqli_num_rows($result3) > 0){
                                while($row3 = mysqli_fetch_array($result3)){
                            if($category==='admin' || $category==='adminstrator')
                            {
                           include('include/adminleftnavigation.php');                            }
                            else
                            {
                         include('include/adminleftnavigation2.php');
                            }
                        }
                        }

                        
                    }

   // $ses_sql = mysqli_query($con,"select email from MyUsers where email = '$user_check' ");
   
   // $row = mysqli_fetch_array($ses_sql);
   
   if(!isset($_SESSION['email'])){
      header("location:login.php");
   }
?>