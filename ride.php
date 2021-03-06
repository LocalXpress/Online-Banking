  <?php
    include 'function.php';
    session_start();
    if(!isset($_SESSION['u_id']))
    header('location:logIn.php');
    $user=getuserdetails($_SESSION['u_id']);
  ?>
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
      padding-bottom:10px;
    }
    #map
    {
      padding-top:30px;
      padding-bottom:10px;
      width:650px;
      height:450px;
    }
    b
    {
      font-size:12px;
    }
    p3
    {
      font-size:30px;
      padding-left:4px;
    }
    #pad
    {
      padding: 30px;
      width: 0px;
    }
    #left_bar
    {
    float: left;
    width: 40%;
    padding-bottom:10px;
    }
    #right_bar
    {
    float: right;
    width: 30%;
    padding-bottom:10px;
    }
    .button
    {
    float: middle;
    width: 20%;
    background-color: white; 
    color: black; 
    border: 2px solid gold;
    }
    .button:hover
    {
    background-color:#ffff88;
    }
    .select_style
    {
    border: 0.5px solid gold;
    background: transparent;
    padding: 5px;
    width:150px;
    -webkit-appearance: none;
    }
    .select_style:hover
    {
    transform: scale(1.2);
    }
    #rday
    {
    -webkit-appearance: none;
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
            <legend><h1><center>RIDE NOW</center></h1></legend>
            <div id="test_2">
            <b>RIDE DETAILS</b>
            </div>
            <div id="info_block">
            <b>DEPURTURE</b>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <select id="start" class="select_style">
              <option value="chicago, il">Chicago</option>
              <option value="st louis, mo">St Louis</option>
              <option value="joplin, mo">Joplin, MO</option>
              <option value="oklahoma city, ok">Oklahoma City</option>
              <option value="amarillo, tx">Amarillo</option>
              <option value="gallup, nm">Gallup, NM</option>
              <option value="flagstaff, az">Flagstaff, AZ</option>
              <option value="winona, az">Winona</option>
              <option value="kingman, az">Kingman</option>
              <option value="barstow, ca">Barstow</option>
              <option value="san bernardino, ca">San Bernardino</option>
              <option value="los angeles, ca">Los Angeles</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>ARRIVAL</b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="end" class="select_style">
              <option value="chicago, il">Chicago</option>
              <option value="st louis, mo">St Louis</option>
              <option value="joplin, mo">Joplin, MO</option>
              <option value="oklahoma city, ok">Oklahoma City</option>
              <option value="amarillo, tx">Amarillo</option>
              <option value="gallup, nm">Gallup, NM</option>
              <option value="flagstaff, az">Flagstaff, AZ</option>
              <option value="winona, az">Winona</option>
              <option value="kingman, az">Kingman</option>
              <option value="barstow, ca">Barstow</option>
              <option value="san bernardino, ca">San Bernardino</option>
              <option value="los angeles, ca">Los Angeles</option>
            </select>
            <br><br>
            <b>CAR TYPE </b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="car_type" class="select_style">
              <option value="M">MICRO</option>
              <option value="S">SUV</option>
              <option value="P">PRIME</option>
              <option value="B">SHUTTLE</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>DATE OF JOURNEY</b>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" id="rday" class="select_style"><br>
            </div>
            <br>
            <div id="map"></div><br>
            <div id="left_bar"></div>
            <form>
            <input type="button" class="button" value="RIDE NOW" onclick="ridenow();"/>
            </form>
            <div id="right_bar"></div>
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
  var time_required=0;
  function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
        document.getElementById('car_type').addEventListener('change', onChangeHandler);
        document.getElementById('rday').addEventListener('change', onChangeHandler);
      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            distance=(((response.routes[0].legs[0].distance.value).toPrecision(2))/1000);
            time_required=(((response.routes[0].legs[0].distance.value)/1000)/50).toPrecision(2);
            date = document.getElementById('rday').value;
            type=document.getElementById('car_type').value;
            if(type=="M")
              {cost=100+(distance*5);}
            else if(type=="S")
              {cost=150+(distance*5);}
            else if(type=="P")
              {cost=200+(distance*5);}
            else 
              {cost=300+(distance*5);}
        
        directionsDisplay.setDirections(response);
        document.getElementById("left_bar").innerHTML ="<br><p><b>Distance: </b>"+distance+" KM </p><p><b>Expected Time to reach: </b>"+time_required+" HOURS </p>";
        document.getElementById("right_bar").innerHTML="<br><p><b>Cost: Rs</b>"+cost+"</p><p><b>Date of Journey: </b>"+date+"</p>";

        } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function ridenow()
      {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10) {dd='0'+dd} 
            if(mm<10) {mm='0'+mm} 
            today = yyyy+'-'+mm+'-'+dd;
            
            if(date>today && date!=null)
              {
                url="confirm.php?distance="+distance+"&time_required="+time_required+"&date="+date+"&cost="+cost+"&c_type="+type;
                window.location=url;
              }
            else
              alert("CHOOSE CORRECT DATE!!!");
      }
      function display()
      {
        var user=<?php echo json_encode($user, JSON_PRETTY_PRINT)?>;
        document.getElementById("user_name").innerHTML=user.u_name;
      }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClTaFItZI40JCBSkfsg43nKGd_rkGWv70&callback=initMap">
</script>
</body>
</html>
