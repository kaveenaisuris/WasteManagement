<?php   include "db.php";    ?>
<?php session_start(); ?>



<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>

        .anyClass {
            height:100%;
            overflow-y: scroll;
        }
        #map {

            height: 500px;
            width: 1000px;


        }

    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="row">
    <div class="col-2 anyClass overflow-y: scroll;">



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
    <div class="col-9">
      <div id="map" style="height: 100%; width: 100%" ></div>
    </div>
</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeu1e7kOJv-nvl_P-uye4LvC9IK00PeFI&callback=initMap">
</script>
<script>

    function initMap() {
        var myLatlng = {lat: 6.927079, lng: 79.861244};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatlng
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Click to zoom'
        });
    }

</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>


