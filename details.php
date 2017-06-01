<?php
  session_start();
  if(!isset($_SESSION['u_id']))
    header('location:logIn.php');
  include('function.php');

  $user=getuserdetails($_SESSION['u_id']);
?>
<script>
function display()
{
  var user=<?php echo json_encode($user, JSON_PRETTY_PRINT)?>;
  document.getElementById("user_name").innerHTML=user.u_name;
  document.getElementById("user_id").innerHTML="<b>USER ID:</b> "+user.u_id;
  document.getElementById("user_mail").innerHTML="<b>USER MAIL :</b> "+user.u_mail;
  document.getElementById("user").innerHTML="<b>USER NAME :</b> "+user.u_name;

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
  b
    {
      font-size: 15px;
    }
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
    }
    b
    {
      font-size:20px;
    }
  </style>
</head>
<body onload="display();">

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
      <div>
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
          <form class="form-horizontal">
            <fieldset>
            <legend><h1><center>RIDE DETAILS</center></h1></legend>
            <div id="test_2">
            <b>PERSONAL DETAILS</b>
            </div>
            <div id="info_block">
            <div id="user"></div>
            <div id="user_id"></div>
            <div id="user_mail"></div>
            </div>
    <table class="table table-striped table-hover ">
  <thead>
  <tr>
    <th>Ride No</th>
    <th>Car ID</th>
    <th>Driver ID</th>
    <th>BOOKING DATE</th>
    <th>DEPURTURE DATE</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>1</td>
    <td>09/01/2017</td>
    <td>10/01/2017</td>
    <td>1000</td>
    <td></td>
  </tr>
  </tbody>
</table>     
       	</div>
      </div>
      
    </div>
  </div>    
</div>
    
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
