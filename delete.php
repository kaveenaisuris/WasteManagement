<?php

include_once('db.php');
/**
 * Created by PhpStorm.
 * User: wishwa
 * Date: 2019-01-02
 * Time: PM 6.03
 */
if(isset($_GET['post_id'])) {
    $id = (int)$_GET['post_id'];
    $query = "DELETE FROM gpostnonapproved WHERE p_id=$id";
    $create_event_query = mysqli_query($connection, $query) or die("Failed".mysqli_error($connection));
    echo "<meta http-equiv='refresh' content='0;url=Dashboard.php'>";
}
?>