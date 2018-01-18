

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script type="text/javascript">
  window.onload = function () {
    var x = document.getElementById("enquiry").value;
     var y= document.getElementById("products").value;
    console.log(y);
    console.log(x);
    var  ch =x;
    var  ch1=y;
    var chart = new CanvasJS.Chart("chart",
    {
        //var aa = 7;
      title:{
        text: "Products VS Enquires",
        fontFamily: "Impact",
        fontWeight: "normal"
      },

      legend:{
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [
      {
        //startAngle: 45,
       indexLabelFontSize: 20,
       indexLabelFontFamily: "Garamond",
       indexLabelFontColor: "darkgrey",
       indexLabelLineColor: "darkgrey",
       indexLabelPlacement: "outside",
       type: "doughnut",
       showInLegend: true,
       dataPoints: [
       {  y:ch1, legendText:"Products", indexLabel: "Products" },
       {  y:ch, legendText:"Enquires", indexLabel: "Enquires" }
       ]
     }
     ]
   });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body style="overflow:auto">
    <div id="wrapper">
    <?php include('db.php');  
include('session.php');   
?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your App</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <?php
                                include('db1.php');
                                $sql = "SELECT COUNT(id) AS id FROM enquiry";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<h3>";
                                echo $row['id'];
                                echo "</h3>";
                                $enquiry=$row['id'];
                            }
                        }
                    }
                        ?>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Enquiries

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                 <?php
                                include('db1.php');
                                $sql = "SELECT COUNT(id) AS id FROM product";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<h3>";
                                echo $row['id'];
                                echo "</h3>";
                                $products=$row['id'];
                            }
                        }
                    }
                        ?>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Products

                            </div>
                        </div>
                    </div>
                     <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="panel panel-primary text-center no-boder bg-color-red" style="height:170px">
                        <div class="panel-body">
                            <i class="fa fa fa-comments fa-5x"></i>
                            <br>
                            <button  onclick="loadDoc()" data-toggle="modal" data-target="#myModal">
                              <h3>
                                 <?php
                                include('db1.php');
                                 $sql = "SELECT name FROM myusers where email='$user_check'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                                $createdby=$row["name"];
                            }
                        }
                    }
                    $sql = "SELECT id FROM myusers where name='$createdby'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                
                                $created=$row["id"];
                            }
                        }
                    }
                                date_default_timezone_set('Asia/Kolkata');  
                                $date=date("m/d/Y");
                                $sql = "SELECT COUNT(id) AS id FROM enquiry where nextfollowupdate='$date' and assigned='$created' and id NOT IN (SELECT enquiry_id FROM followup where status ='Confirm' OR status='Reject')";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){

                                echo $row['id'];
                                 echo '<i class="fa fa-users" aria-hidden="true"></i>';    
                                $followups=$row['id'];
                            }
                        }
                    }
                        ?>
                              </h3>
                            </button>

                            <div class="panel-footer back-footer-red">
                               Today FollowUps
                            </div>
                          </div>
                        </div>
                      </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                 <?php
                                include('db1.php');
                                $sql = "SELECT COUNT(id) AS id FROM myusers";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<h3>";
                                echo $row['id'];
                                echo "</h3>";
                            }
                        }
                    }
                        ?>
                            </div>
                            <div class="panel-footer back-footer-brown">
                               No.of Users
                            </div>
                        </div>
                    </div>
                    
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="width:700px;text-align:center;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Today Followups
                                             <?php 
                                            date_default_timezone_set('Asia/Kolkata');  
                                            echo date("m/d/Y"); ?>
                                            </h4>
                                        </div>
                                        <div  id="modal-body" style="width:100%">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                 
                    </div>
                               <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel-body" >
                                <div id="chart" style="width:300px;height:300px;text-align:center;position:absolute;" ></div>
                            </div>
                    </div>
                    </div>

                </div>
                <div>
                <input type="hidden"  id="products"  value="<?php echo $products; ?>">
                <input type="hidden"  id="enquiry"  value="<?php echo $enquiry; ?>">
                 </div>  

                <!-- /. ROW  -->
        <!-- /. PAGE WRAPPER  -->
    </div>

    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script type="text/javascript">
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("modal-body").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "followup/followupondate.php", true);
  xhttp.send();
}
</script>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>