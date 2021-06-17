<?php   include "db.php";    ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>adpost</title>


   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Waste Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="allpost.php">All ads</a></li>
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
   
   
   
    <?php
    
     if(isset($_GET['id'])){
        $id=$_GET['id'];
    
        $query ="select * from products where p_id='{$id}'";
        $select_all_query=mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_assoc($select_all_query)){
            $pname = $row["pname"];
            $location = $row["location"];
            $price = $row["price"];
             $img = $row["img"];
            $id = $row["p_id"];
            $description = $row["description"];
            $category = $row["category"];
            $phone = $row["phone"];
            $lon = $row["lon"];
            $lan= $row["lat"];
            
        ?>
        
        
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $pname;  ?></h1>

          <!-- Author -->
          

          <hr>

          <!-- Date/Time -->
          <p><?php echo $location;  ?></p>
          <br>
          <p><?php echo $category;  ?></p>

          <hr>
    <h3 class="text-danger"><?php echo $price;  ?></h3>
          <h4 class="text-success"><b><?php echo $phone;  ?></b></h4>
          
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $img;  ?>" alt="img">

          <hr>
<?php echo $location;  ?>
             <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDXycgIEuM8Dwc2gCZZCmnBwfxNudJfXIQ'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-generator.com/'>maps-generator.com</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=97729487d54d9a0588c1b5323758b265dda816b8'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(7.472981299999999,80.35472860000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(7.472981299999999,80.35472860000004)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br><br> kurunegala<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
          <!-- Post Content -->
          <p class="lead"><?php echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit dolores perferendis quis iusto voluptate culpa, provident recusandae fugiat velit debitis. Ipsa odio nulla, voluptates obcaecati hic inventore necessitatibus animi aliquam delectus! Distinctio eos perspiciatis aspernatur praesentium earum, expedita aliquam ducimus temporibus, consequuntur ad dolor, voluptas, labore tempore cupiditate! Omnis, doloribus.";  ?></p>
     
         
         .
          

          <hr>

      </div>
      <!-- /.row -->

    </div>
    
    <?php
        }   }
            
            ?>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
      
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>