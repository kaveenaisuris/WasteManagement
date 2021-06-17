<?php
/**
 * Created by PhpStorm.
 * User: kaveena
 * Date: 2019-01-02
 * Time: PM 6.22
 */

include_once('db.php');
if(isset($_GET['post_id'])) {
    $p_id = (int)$_GET['post_id'];
    $lng = (float)$_GET['lng'];
    $lat = (float)$_GET['lat'];
    $description = $_GET['dis'];
    $img = $_GET['img'];
    $query ="Insert into gpostapproved(description,img,lat,lng)";
    $query .="values('{$description}','{$img}','{$lat}','{$lng}')";
    $create_event_query = mysqli_query($connection, $query) or die("Failed".mysqli_error($connection));
    $query1 ="Insert into colleges(name,address,type,lat,lng)";
    $query1 .="values('{$description}','xxxx','college','{$lat}','{$lng}')";
    $create_event_query = mysqli_query($connection, $query1) or die("Failed".mysqli_error($connection));

//    echo "<meta http-equiv='refresh' content='0;url=Dashboard.php'>";
}

if(isset($_GET['post_id'])) {
    $id = (int)$_GET['post_id'];
    $query1 = "DELETE FROM gpostnonapproved WHERE p_id=$id";
    $create_event_query = mysqli_query($connection, $query1) or die("Failed".mysqli_error($connection));
    echo "<meta http-equiv='refresh' content='0;url=Dashboard.php'>";
}
?>