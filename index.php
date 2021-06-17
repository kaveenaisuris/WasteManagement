<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Waste Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.mySlides {display:none;}
.myCarousel{
    height: 250px;

}
</style>

<link rel="stylesheet" type="text/css" href="index.html">
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">Waste Management</a>
    </div>

    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
      
	   <?php if(isset($_SESSION['username'])){
        if($_SESSION['user_role']=='admin'){
            echo "<li><a href='DashBoard.php'>DashBoard</a></li>";
			
			echo "<li><a href='allpost.php'>Map Grbage</a></li>";
            }
        }
        ?>
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
                   if($_SESSION['user_role']=='admin'){
                       
                       echo "<li><a href='#'>{$_SESSION['username']}</a></li>";

                       echo "<li><a href='logout.php'>Log Out</a></li>";
                   }else{
                       echo "<li><a href='#'>{$_SESSION['username']}</a></li>";
                       echo "<li><a href='adpost.php'>Post a Ad</a></li>";
                       echo "<li><a href='logout.php'>Log Out</a></li>";
                   }


               }else{
                  echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                   echo "<li><a href='reg.php'><span class='glyphicon glyphicon-log-in'></span> Register</a></li>";
               }

               ?>
    </ul>
  </div>
</nav>


<div class="container1">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="img1.jpg" alt="Los Angeles" style="width:20%;">
                <div class="carousel-caption">
                    <h3>Colombo</h3>
                    <p>Clean And Safety!</p>
                </div>
            </div>

            <div class="item">
                <img src="img3.jpg" alt="Chicago" style="width:25%;">
                <div class="carousel-caption">
                    <h3>25% of all items in recycling bins are actually trash. That's a big problem impacting recycling
                        <br>efforts around the world. You can help by following <br>
                        three simple rules</h3>

                </div>
            </div>

            <div class="item">
                <img src="img5.jpg" alt="New York" style="width:25%;">
                <div class="carousel-caption">
                    1.Recycle empty plastic bottles, cans, paper and cardboard.<br>
                    2.Keep foods and liquids out of your recycling.<br>
                    3.Keep plastic bags out of your recycling.
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



<h2><b>Welcome to Waste Management in Sri Lanka!</b></h2>
 <p>Sri Lanka generates 7000MT of solid waste per day with the Western Province accounting for nearly 60% of waste generation.  Each person generates an average of 1-0.4kg of waste per day.  According to the Waste Management Authority and the Central Environmental Authority, only half of the waste generated is collected.</p>

<!--<div>-->
<!--  <img class="mySlides" src="img1.jpg" width="1354" height="570" >-->
<!--  <img class="mySlides" src="img2.jpg" width="1354" height="570" >-->
<!--  <img class="mySlides" src="img3.jpg" width="1354" height="570" >-->
<!--  <img class="mySlides" src="img4.jpg" width="1354" height="570" >-->
<!--  <img class="mySlides" src="img5.jpg" width="1354" height="570" >-->
<!--</div>-->
<!---->
<!--<script>-->
<!--var myIndex = 0;-->
<!--carousel();-->
<!---->
<!--function carousel() {-->
<!--    var i;-->
<!--    var x = document.getElementsByClassName("mySlides");-->
<!--    for (i = 0; i < x.length; i++) {-->
<!--       x[i].style.display = "none";-->
<!--    }-->
<!--    myIndex++;-->
<!--    if (myIndex > x.length) {myIndex = 1}-->
<!--    x[myIndex-1].style.display = "block";-->
<!--    setTimeout(carousel, 3000); // Change image every 3 seconds-->
<!--}-->
<!--</script>-->

</body>
</html>

