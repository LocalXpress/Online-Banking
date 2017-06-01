<?php
  session_start();
  if(!isset($_SESSION['u_id']))
    header('location:logIn.php');
  if($_GET['distance']==0)
    header('Location:ride.php');
  include('function.php');

  $car=getcardetails($_GET['c_type']);
  $driver=getdriverdetails();
  $user=getuserdetails($_SESSION['u_id']);

  if($car['c_id']&&$driver['d_id'])
    bookcar($car['c_id'],$driver['d_id'],$user['u_id'],$_GET['date']);
?>
<script>
function display()
{
var driver=<?php echo json_encode($driver, JSON_PRETTY_PRINT)?>;
var car =<?php echo json_encode($car, JSON_PRETTY_PRINT)?>;
var user =<?php echo json_encode($user, JSON_PRETTY_PRINT)?>;
document.getElementById("user_name").innerHTML=user.u_name;
if((car && driver))
{
//booking details
document.getElementById("e").innerHTML="<b>YOUR BOOKING HAS BEEN CONFIRMED!</b>";
document.getElementById("name").innerHTML="<b>NAME: </b>"+user.u_name;
document.getElementById("mail").innerHTML="<b>PHONE: </b>"+user.u_mail;
document.getElementById("total_distance").innerHTML="<b>Total Distance: </b><?php echo $_GET['distance'];?>";
document.getElementById("expected_time_required").innerHTML="<b>Expected Time to Reach: </b><?php echo $_GET['time_required'];?> Hours";
document.getElementById("depurture_date").innerHTML="<b>Date of Depurture: </b><?php echo $_GET['date'];?>";
document.getElementById("total_cost").innerHTML="<b>Total Cost: </b>Rs<?php echo $_GET['cost'];?>/-";
document.getElementById("otp").innerHTML="<b>OTP: </b><?php echo generateRandomString();?>";
document.getElementById("car_type").innerHTML="<b>Car Type: </b><?php echo $_GET['c_type'];?>";
//car details
document.getElementById("car_name").innerHTML="<b>Name of the car: </b>"+car.c_name;
document.getElementById("car_number").innerHTML="<b>Car Number: </b>"+car.c_number;
document.getElementById("driver_name").innerHTML="<b>Driver Name: </b>"+driver.d_name;
document.getElementById("driver_contact_number").innerHTML="<b>Phone Number: </b>"+driver.d_number;
document.getElementById("driver_mail").innerHTML="<b>Mail ID: </b>"+driver.d_mail;
}
else
document.getElementById("error").innerHTML="<b>YOUR BOOKING IS NOT CONFIRMED!!</b>";
}
</script>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title id="user_name"></title>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="dist/css/bootstrap-material-design.css" rel="stylesheet">
  <link href="dist/css/ripples.min.css" rel="stylesheet">
  <link href="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  #test 
    {
    border-top: 8px solid gold;
    border-bottom:4px solid gold;
    }
    #test_2
    {
    border-top: 6px solid gold;
    border-bottom:2px solid gold;
    padding-top: 2px;
    padding-bottom:15px;
    }
    #info_block
    {
    padding-top:10px;
    border-bottom:4px solid gold;
    padding-bottom:30px;
    }
    b
    {
    font-size:20px;
    }
    #button
    {
    background-color: white; 
    color: black; 
    border: 2px solid gold;
    padding: 5px;
    }
    #button:hover
    {
    background-color:#ffff88;
    }
    b
    {
      font-size: 15px;
    }
  </style>
</head>
<body onload="display()">

<fieldset>
<div class="container" style="width: 700px; height:100px;">
<div class="bs-docs-section">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
      </div>
    </div>
</div>
    <div class="row">
        <div class="well bs-component">
        <div id="test">
        <ul class="nav nav-pills">
            <li><a href="details.php">RIDE DETAILS<span class="badge"></span></a></li>
            <li><a href="ride.php">RIDE<span class="badge"></span></a></li>
            <li><a href="contact.php">CONTACT US<span class="badge"></span></a></li>
            <li><a href="logIn.php">LOG OUT<span class="badge"></span></a></li>
          </ul>
          </div>
          <br>
          <div id="HTMLtoPDF">
          <form class="form-horizontal">
            <fieldset>
            <legend><h1><center>BOOKING INVOICE</center></h1></legend>
            <div id="test_2">
            <b>BOOKING DETAILS</b>
            </div>
            <div id="info_block">
            <div id="e"></div>
            <div id="name"></div>
            <div id="mail"></div>
            <div id="error"></div>
            <div id="total_distance"></div>
            <div id="expected_time_required"></div>
            <div id="total_cost"></div>
            <div id="depurture_date"></div>
            <div id="car_type"></div>
            <div id="otp"></div>
            </div>
            <div id="test_2">
            <b>CAR AND DRIVER DETAILS</b>
            </div>
            <div id="info_block">
            <div id="car_name"></div>
            <div id="car_number"></div>
            <div id="driver_name"></div>
            <div id="driver_contact_number"></div>
            <div id="driver_mail"></div>
            </div>
            <br>
            <center><input type="button" id="button" onclick="HTMLtoPDF()" value="DOWNLOAD AS PDF"/></center>
          </div>
      </div>
      
    </div>
  </div>    
</div>
<script src="js/jspdf.js"></script>
<script src="js/jquery-2.1.3.js"></script>
<script src="js/pdfFromHTML.js"></script>   
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="dist/js/ripples.min.js"></script>
<script src="dist/js/material.min.js"></script>
<script src="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
<script>
  $(function () {
    $.material.init();
    $(".shor").noUiSlider({
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });

    $(".svert").noUiSlider({
      orientation: "vertical",
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });
  });
</script>
</body>
</html>
