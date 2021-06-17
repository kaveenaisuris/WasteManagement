<?php   include "db.php";    ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Access  Maps</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>

        .anyClass {
            height:100%;
            overflow-y: scroll;
        }
        .container {
            height: 450px;
        }
        #map {
            height: 750px;
            position: relative;
            left: -20px;
            border: 3px solid #73AD21;
        }
        #data, #allData {
            display: none;
        }
    </style>
    <!-- Bootstrap CSS -->
    
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Waste Management</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="allpost.php">Map Grbage</a></li>

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

                echo "<li><a href='logout.php'>Log Out</a></li>";
            }else{
                echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                echo "<li><a href='reg.php'><span class='glyphicon glyphicon-log-in'></span> Register</a></li>";
            }

            ?>
        </ul>
    </div>
</nav>
<div class="row">
    <div class="col-md-3 anyClass overflow-y: scroll;">
        <?php
        $query ="select * from gpostapproved";
        $select_all_query=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_all_query)){
            $lat = $row["lat"];
            $lng = $row["lng"];
            $dis = $row["description"];
            $img = $row["img"];
            $id = $row["p_id"];

            ?>
            <!-- Blog Post -->
            <div class="card">
                <img class="card-img-top" src="<?php echo $img;  ?>" alt="Card image cap" width="500px" height="200px">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $dis;  ?></h2>
                    <a href="onepost.php?id=<?php echo $id;  ?>" class="btn btn-primary">View Item &rarr;</a>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
            <div class="conatiner" style="padding:20px;"></div>
            <?php


        }
        ?>


    </div>
     <div class="col-md-9">


             <div class="container">

                 <?php
                 require 'education.php';
                 $edu = new education;
                 $coll = $edu->getCollegesBlankLatLng();
                 $coll = json_encode($coll, true);
                 echo '<div id="data">' . $coll . '</div>';

                 $allData = $edu->getAllColleges();
                 $allData = json_encode($allData, true);
                 echo '<div id="allData">' . $allData . '</div>';
                 ?>
                 <div id="map"></div>
             </div>
     </div>
</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeu1e7kOJv-nvl_P-uye4LvC9IK00PeFI&callback=loadMap">
</script>
</html>















<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>