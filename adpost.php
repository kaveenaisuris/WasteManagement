<?php session_start(); ?>
<html>
<head>
<title>adpost</title>
<link rel="stylesheet" type="text/css" href="reg.css">

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 250px;
            width: 250px;
            padding-left: 25%;
            padding-right: 25%;
            padding-bottom:5;
            margin: 0 auto;
            align-items: center;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Waste Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="allpost.php">All Post</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <?php
               if(isset($_SESSION['username'])){
                   echo "<li><a href='#'>{$_SESSION['username']}</a></li>";
                   echo "<li><a href='adpost.php'>Post a Ad</a></li>";
                   echo "<li><a href='logout.php'>Log Out</a></li>";
               }else{
                  echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                   echo "<li><a href='reg.php'><span class='glyphicon glyphicon-log-in'></span> Register</a></li>";
               }
               
               ?>
    </ul>
  </div>
</nav>
<div id="map"></div>



<div class="simple-form">
<form id="registration" action="adpost_backend.php" method="post" enctype="multipart/form-data">
    <input type="text" name="location" id="button" ><br><br>

 <textarea name="description" rows="10" cols="30" >
Description
</textarea>
<br>


<font color="white">Select image to upload:</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="file" name="fileToUpload" id="fileToUpload"><br>



<input type="submit" name="submit" value="Submit" id="butt"> &nbsp;


</form>

</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeu1e7kOJv-nvl_P-uye4LvC9IK00PeFI&callback=initMap">
</script>
<script>
    var lat;
    var lng;
    function initMap() {
        var myLatlng = {lat: 6.927079 , lng:79.861244};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatlng
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Click to zoom'
        });

        map.addListener('center_changed', function() {
            // 3 seconds after the center of the map has changed, pan back to the
            // marker.
            window.setTimeout(function() {
                map.panTo(marker.getPosition());
            }, 3000);
        });

//        marker.addListener('click', function() {
//            map.setZoom(8);
//            map.setCenter(marker.getPosition());
//        });
        marker.addListener('dblclick', function() {
            map.setCenter(this.marker.getPosition());
            alert(marker.getPosition().lat().toString()+" "+marker.getPosition().lng());
        });

        google.maps.event.addListener(map, 'click', function(event) {
            var mar = placeMarker(event.latLng);

            lat = mar.getPosition().lat();
            lng = mar.getPosition().lng();
            document.getElementById("button").value = lat + "," + lng;

        });

        function placeMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            return marker;
        }

    }
</script>

</body>
</html>